@extends('client.master_client')
@section('client')

<div class="d-flex flex-column">

    
<img class=" w-25 " src="{{asset('frontend/assets/img/UNWINDLOGO.png')}}" style="margin: auto; margin-top: 100px;">

<div class="container rounded-4 mb-5">
<h1>ABOUT THE COMPANY</h1>
<p class="  ">We are a group of Developers/Business owners that produced a website for our company that is named "UNWIND" that offers affordable Condo units for our customers
  
  <br/> condotel company owned by an association is a type of real estate business that offers a hybrid of condominium and hotel services to its clients. The company owns a building or a complex of units that are individually owned and managed by the association.
  <br/> 
  The condotel company allows owners to use their units as vacation homes, while also renting them out to guests as hotel rooms when they are not in use. The company takes care of all the maintenance and upkeep of the units, as well as managing the rental process for owners who wish to rent out their units.
  <br/> 
  The association that owns the condotel company is typically made up of the individual unit owners, who elect a board of directors to oversee the company's operations. The association also sets the policies and guidelines for the use of the units, such as rental rates and guest restrictions.
  <br/> 
  The condotel company may offer amenities such as a pool, fitness center, and 24-hour front desk service to guests, as well as concierge services to assist with local attractions and activities.
  <br/> 
  Overall, a condotel company owned by an association provides a unique investment opportunity for individuals who want to own a vacation home, while also generating income through rental services.</p>
  
  <h1>MISSION</h1>
  <p>
    Our mission is to provide exceptional vacation experiences for our guests while maximizing the investment value for our condo owners. We are committed to maintaining the highest level of professionalism, integrity, and sustainability in all aspects of our operations, from property management to guest services. We strive to exceed expectations by delivering personalized and innovative services that cater to the needs of our clients.</p>
    <h1>VISION</h1>
  <p>
    Our vision is to be the leading condotel company that sets the standard for excellence in the vacation rental industry. We aspire to be recognized for our commitment to sustainable and responsible tourism practices that enhance the social, environmental, and economic well-being of the communities we operate in. We aim to build long-lasting relationships with our guests and owners by providing exceptional customer service, creating unforgettable memories, and delivering outstanding investment returns.</p>

</div>
</div>


<H1 class="container shadow-sm border-bottom">TEAM WHO MADE THIS POSSIBLE</H1>
<div class="container reviewContainer reveal fade-bottom">
<div class="box">
  <div class="imgBox">
    <img src="{{asset('frontend/assets/img/profile/me.jpg')}}"/>
  </div>
  <div class="content rounded shadow mb-3">
    <h2>Czedrick Rodis <br/>
    </h2>
    <p>FRONT-END DEVELOPER 🍵</p>
  </div>
</div>
<div class="box reveal fade-bottom">
  <div class="imgBox">
    <img src="{{asset('frontend/assets/img/profile/aaron.png')}}"/>
  </div>
  <div class="content rounded shadow mb-3">
    <h2>Marc Pasaraba <br/>
    </h2>
    <p>BACK-END DEVELOPER☕</p>
  </div>
</div> 
<div class="box reveal fade-bottom">
  <div class="imgBox">
    <img src="{{asset('frontend/assets/img/profile/roleen.jpg')}}"/>
  </div>
  <div class="content rounded shadow mb-3">
    <h2>Roleen Nebres<br/></h2>
    <p>FRONT-END DEVELOPER 🦴</p>
  </div>
</div>
<div class="box reveal fade-bottom">
  <div class="imgBox">
    <img src="{{asset('frontend/assets/img/profile/jc.png')}}"/>
  </div>
  <div class="content rounded shadow mb-3">
    <h2>John Carlo Cerdeña<br/></h2>
    <p>BACK-END DEVELOPER 🖨🖨</p>
  </div>
</div>

</div>
@endsection