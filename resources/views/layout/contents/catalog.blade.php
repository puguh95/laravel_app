<section id="catalog" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Katalog</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>
        <div class="row">
        @foreach($catalogs as $catalog)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="{{$loop->index % 3 * 100 + 100}}">
            <div class="icon-box">
                <img src="{{ url('uploads/catalogs/'.$catalog->image)}}" width="300px">
              <h4>{{$catalog->name}}</h4>
              <p>Code: {{$catalog->code}}</p>
              <p>{{$catalog->description}}</p>
              <h4><sup>Rp</sup>{{$catalog->price}}<span> / hari</span></h4>
              <div class="pricing">
                <div class="box">
                  <a href="/catalog/{{$catalog->id}}/order" class="btn-buy">Pesan {{$catalog->code}}</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </section>