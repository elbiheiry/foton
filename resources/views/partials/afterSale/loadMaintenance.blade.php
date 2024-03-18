    @if( count($main->maintenances))
    <div class="maintenance mt-5">
    <div class="title">
            <h4 class="custom-character main-color">{{$main->localized->title}}</h4>
        </div>
        <div class="maintenance-info mt-3">
            <table class="table table-bordered table-hover">
                <thead class='thead-light'>
                    <tr>
                        <th scope="col">{{__('admin.K-M')}}</th>
                        <th scope="col">{{__('admin.Description')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($main->maintenances as $maintenance)
                        <tr>
                            <td>{{$maintenance->km}} {{__('admin.K-M')}}</td>
                            <td>{{$maintenance->description}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
