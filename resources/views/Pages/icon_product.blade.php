<center>
<br><div class="items-menu" style="overflow-x: none;">
      <a style="cursor: pointer;" onclick="migration()">
        <div class="item-menu item6">
          <img src="{!! asset('public\assets\images\icon\icon\Bimbel-Online-Free.png') !!}" style="max-width: 50px;">
          <br>
          Latihan Gratis
        </div>
      </a>   

      <a style="cursor: pointer;" onclick="migration()">
        <div class="item-menu item5">
          <img src="{!! asset('public\assets\images\icon\icon\Bimbel Online.png') !!}" style="max-width: 50px;">
          <br>
          Permata Bimbel Online
        </div>
      </a>  

     <!--  <a href="{{ route('Private.List') }}">
        <div class="item-menu item8">
          <img src="{!! asset('public\assets\images\icon\icon\Privat.png') !!}" style="max-width: 50px;">
          <br>
          Permata Les Privat
        </div>
      </a> -->
      <a href="{{ route('pengembangan') }}">
        <span style="position: absolute; margin-left: 10px;margin-top: 15px;background: #03a84e;padding: 2px;border-radius: 5px;color: #fff;font-size: 10px;">pengembangan</span>
        <div class="item-menu item15">
          <img src="{!! asset('public\assets\images\icon\icon\retail.png') !!}" style="max-width: 50px;">
          <br>
          Permata Belanja
        </div>
      </a>

      <!-- <a href="{{ route('Food.index') }}">
        <span style="position: absolute; margin-left: 10px;margin-top: 15px;background: #03a84e;padding: 2px;border-radius: 5px;color: #fff;font-size: 10px;">pengembangan</span>
        <div class="item-menu item14">
          <img src="{!! asset('public\assets\images\icon\icon\kuliner.png') !!}" style="max-width: 50px;">
          <br>
          Permata Makanan
        </div>
      </a> -->
      <a href="{{ route('pengembangan') }}">
        <span style="position: absolute; margin-left: 10px;margin-top: 15px;background: #03a84e;padding: 2px;border-radius: 5px;color: #fff;font-size: 10px;">pengembangan</span>
        <div class="item-menu item9">
          <img src="{!! asset('public\assets\images\icon\icon\Tiket.png') !!}" style="max-width: 50px;">
          <br>
          Permata Ticketing
        </div>
      </a>
      <a href="{{ route('pengembangan') }}">
        <span style="position: absolute; margin-left: 10px;margin-top: 15px;background: #03a84e;padding: 2px;border-radius: 5px;color: #fff;font-size: 10px;">pengembangan</span>
        <div class="item-menu item1">
          <img src="{!! asset('public\assets\images\icon\icon\Gedung Pertemuan.png') !!}" style="max-width: 50px;">
          <br>
          Permata Sewa Gedung
        </div>
      </a>      
     <!--  <a href="">
        <span style="position: absolute; margin-left: 10px;margin-top: 15px;background: #03a84e;padding: 2px;border-radius: 5px;color: #fff;font-size: 10px;">pengembangan</span>
        <div class="item-menu item19">
          <img src="{!! asset('public\assets\images\icon\icon\Lowongan.png') !!}" style="max-width: 50px;">
          <br>
          Permata Jasa
        </div> 
      </a> -->     
    </div><br><br>
</center>
    <style type="text/css">
      .items-menu {
          position: relative;
          width: 100%;
          overflow-x: none !important;
          overflow-y: hidden;
          white-space: nowrap;
          transition: all 0.2s;
          will-change: transform;
          user-select: none;
          cursor: pointer;
          padding-left: 35px;
      }
    </style>