 <div class="col-md-12">    
    <div class="panel panel-default" style="background-color: #e0f9e0;">
      <div class="panel-body" style="padding: 20px; text-align: center;">       
        <div class="row">
          @foreach($kategori_pilihan as $kategori_pilihan)
            <div class="col-md-3">
              <div style="width: 100%; float: left; border: 1px solid #6b6b6b; border-radius: 14px;margin-bottom: 10px;padding: 10px;">
                <!-- <a onclick="functiongetjenis('{{ encrypt($kategori_pilihan->id_order) }}')" style="cursor: pointer;"> -->
                <a href="{{ route('ExampPermata.after_kelas',encrypt($kategori_pilihan->id_order)) }}" style="cursor: pointer;">
                 <img class=" img-fluid" src="{!! asset('public/images/bimbel-gratis/'.$kategori_pilihan->image) !!}" alt="card image">
                  <p style="margin-top: 10px; font-weight: bold;">{{ $kategori_pilihan->kelas }}</p>
                </a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>          
  </div> 
