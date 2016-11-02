<div class="col-md-4">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            User Manager
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/users') }}">
                        Users
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/admin/roles') }}">
                        Roles
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/admin/permissions') }}">
                        Permissions
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/admin/give-role-permissions') }}">
                        Give Role Permissions
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            Tools
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/generator') }}">
                        Generator
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
