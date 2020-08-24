@extends('mitra::layouts.master-v2')

@section('content')
<div class="m-portlet m-portlet--tab">
    <form method="post" action="{{ route('Mitra.Profile.Storepassword') }}" class="m-form m-form--fit m-form--label-align-right">
    @csrf
    <div class="m-portlet__body">
        @if ($message = Session::get('Error'))
            <div class="form-group m-form__group">        
                <div class="m-alert m-alert--icon alert alert-danger" role="alert">
                    <div class="m-alert__icon">
                        <i class="flaticon-danger"></i>
                    </div>
                    <div class="m-alert__text">
                        <strong>
                            Maaf
                        </strong>
                        {{ $message }}
                    </div>
                    <div class="m-alert__close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>               
        @endif

        @if ($message = Session::get('success'))
            <div class="form-group m-form__group">        
                <div class="m-alert m-alert--icon alert alert-success" role="alert">
                    <div class="m-alert__icon">
                        <i class="flaticon-user-ok"></i>
                    </div>
                    <div class="m-alert__text">
                        <strong>
                            selamat,
                        </strong>
                        {{ $message }}
                    </div>
                    <div class="m-alert__close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>               
        @endif      
        <div class="form-group m-form__group">
            <div class="row">
                <div class="col-md-6">
                    <label for="usr">Password Lama:</label>
                    <input type="password" name="lama" class="form-control m-input m-input--solid" placeholder="*****">
                </div>
                <div class="col-md-6">
                    <label for="usr">Password Baru:</label>
                    <input type="password" name="baru" class="form-control m-input m-input--solid" placeholder="*****">
                </div>
            </div>
        </div>  
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
      <div class="m-form__actions">
        <button type="submit" class="btn btn-primary">
          Ubah Password
        </button>
      </div>
    </div>
  </form>
  <!--end::Form-->
</div>
@stop
@section('script')
@endsection

