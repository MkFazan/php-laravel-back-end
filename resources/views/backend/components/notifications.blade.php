<div class="row">
    @if($errors->any())
        <div class="col-md-12">
            <div class="card bg-gradient-danger">
                <div class="card-header">
                    <h3 class="card-title">Error</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="col-md-12">
            <div class="card bg-gradient-success">
                <div class="card-header">
                    <h3 class="card-title">{{session()->get('message')}}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
