@extends ('backend.layouts.master')

@section ('title', trans('menus.role_management') . ' | ' . trans('menus.edit_role'))

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.edit_role') }}</small>
    </h1>
@endsection

@section('after-styles-end')
    {!! HTML::style('css/backend/plugin/jstree/themes/default/style.min.css') !!}
@stop

@section('content')
    {!! Form::model($role, ['route' => ['admin.access.roles.update', $role->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role']) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('menus.edit_role') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {!! Form::label('name', trans('validation.attributes.role_name'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.role_name')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                <label class="col-lg-2 control-label">{{ trans('validation.attributes.associated_permissions') }}</label>
                <div class="col-lg-10">
                    @if ($role->id != 1)
                        {{-- Administrator has to be set to all --}}
                        {!! Form::select('associated-permissions', array('all' => 'All', 'custom' => 'Custom'), $role->all ? 'all' : 'custom', ['class' => 'form-control']); !!}
                    @else
                        <span class="label label-success">All</span>
                    @endif

                    <div id="available-permissions" class="hidden">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-info">
                                    <i class="fa fa-info-circle"></i> A permission marked with a
                                    <small><strong>(D)</strong></small>
                                    means that the permission has dependencies. They will be checked automatically when
                                    you select that permission. You can manage each permissions dependencies in the
                                    dependency tab of the edit permission screen.
                                </div><!--alert-->
                            </div><!--col-lg-12-->

                            <div class="col-lg-6">
                                <p><strong>Grouped Permissions</strong></p>

                                @if ($groups->count())
                                    <div id="permission-tree">
                                        <ul>
                                            @foreach ($groups as $group)
                                                <li>{!! $group->name !!}
                                                    @if ($group->permissions->count())
                                                        <ul>
                                                            @foreach ($group->permissions as $permission)
                                                                <li id="{!! $permission->id !!}"
                                                                    data-dependencies="{!! json_encode($permission->dependencies->lists('dependency_id')->all()) !!}">

                                                                    @if ($permission->dependencies->count())
                                                                        <?php
                                                                        //Get the dependency list for the tooltip
                                                                        $dependency_list = [];
                                                                        foreach ($permission->dependencies as $dependency)
                                                                            array_push($dependency_list, $dependency->permission->display_name);
                                                                        $dependency_list = implode(", ", $dependency_list);
                                                                        ?>
                                                                        <a data-toggle="tooltip" data-html="true"
                                                                           title="<strong>Dependencies:</strong> {!! $dependency_list !!}">{!! $permission->display_name !!}
                                                                            <small><strong>(D)</strong></small>
                                                                        </a>
                                                                    @else
                                                                        {!! $permission->display_name !!}
                                                                    @endif

                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                    @if ($group->children->count())
                                                        <ul>
                                                            @foreach ($group->children as $child)
                                                                <li>{!! $child->name !!}
                                                                    @if ($child->permissions->count())
                                                                        <ul> style="padding-left:40px;font-size:.8em">
                                                                            @foreach ($child->permissions as $permission)
                                                                                <li id="{!! $permission->id !!}"
                                                                                    data-dependencies="{!! json_encode($permission->dependencies->lists('dependency_id')->all()) !!}">

                                                                                    @if ($permission->dependencies->count())
                                                                                        <?php
                                                                                        //Get the dependency list for the tooltip
                                                                                        $dependency_list = [];
                                                                                        foreach ($permission->dependencies as $dependency)
                                                                                            array_push($dependency_list, $dependency->permission->display_name);
                                                                                        $dependency_list = implode(", ", $dependency_list);
                                                                                        ?>
                                                                                        <a data-toggle="tooltip"
                                                                                           data-html="true"
                                                                                           title="<strong>Dependencies:</strong> {!! $dependency_list !!}">{!! $permission->display_name !!}
                                                                                            <small><strong>(D)</strong>
                                                                                            </small>
                                                                                        </a>
                                                                                    @else
                                                                                        {!! $permission->display_name !!}
                                                                                    @endif

                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <p>There are no permission groups.</p>
                                @endif
                            </div><!--col-lg-6-->

                            <div class="col-lg-6">
                                <p><strong>Ungrouped Permissions</strong></p>

                                @if ($permissions->count())
                                    @foreach ($permissions as $perm)
                                        <input type="checkbox" name="ungrouped[]" value="{!! $perm->id !!}"
                                               id="perm_{!! $perm->id !!}"
                                               {{in_array($perm->id, $role_permissions) ? 'checked' : ""}} data-dependencies="{!! json_encode($perm->dependencies->lists('dependency_id')->all()) !!}"/>
                                        <label for="perm_{!! $perm->id !!}">

                                            @if ($perm->dependencies->count())
                                                <?php
                                                //Get the dependency list for the tooltip
                                                $dependency_list = [];
                                                foreach ($perm->dependencies as $dependency)
                                                    array_push($dependency_list, $dependency->permission->display_name);
                                                $dependency_list = implode(", ", $dependency_list);
                                                ?>
                                                <a style="color:black;text-decoration:none;" data-toggle="tooltip"
                                                   data-html="true"
                                                   title="<strong>Dependencies:</strong> {!! $dependency_list !!}">{!! $perm->display_name !!}
                                                    <small><strong>(D)</strong></small>
                                                </a>
                                            @else
                                                {!! $perm->display_name !!}
                                            @endif

                                        </label><br/>
                                    @endforeach
                                @else
                                    <p>There are no ungrouped permissions.</p>
                                @endif
                            </div><!--col-lg-6-->
                        </div><!--row-->
                    </div><!--available permissions-->
                </div><!--col-lg-3-->
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('name', trans('validation.attributes.role_sort'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('sort', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.role_sort')]) !!}
                </div>
            </div><!--form control-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                <a href="{!! route('admin.access.roles.index') !!}"
                   class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}"/>
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::hidden('permissions') !!}
    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! HTML::script('js/backend/plugin/jstree/jstree.min.js') !!}
    {!! HTML::script('js/backend/access/roles/script.js') !!}

    <script>
        $(function () {
            @foreach ($role_permissions as $permission)
                tree.jstree('check_node', '#{!! $permission !!}');
            @endforeach
        });
    </script>
@stop