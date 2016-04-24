<div class="page-contact clear-fix">

    <!-- Header + subtitle -->
    <h1>{{ $contact->title }}</h1>
    <p class="subtitle-paragraph">
        <span class="bold">{{ $contact->caption }}</span>
    </p>
    <!--/ Header + subtitle -->

    <!-- Personal details + map -->
    <h3>详细信息</h3>
    <div class="clear-fix contact-details">

        <div class="contact-details-about">

            <i class="fa fa-phone"></i>&nbsp;Tel: {{ $contact->details->tel }}<br>
            <i class="fa fa-globe"></i> {{ $contact->details->url }}<br>
            <i class="fa fa-location-arrow"></i>&nbsp;{{ $contact->details->address }}<br>
            <i class="fa fa-company"></i>&nbsp;{{ $contact->details->company }}

        </div>

        <div class="pull-right" style="max-width: calc(50% - 50px); margin: 2px 20px;">
            <img src="/images/qrcode.jpg" alt="" style="width: 100%;">
        </div>

        <div class="contact-details-map">
            <div class="contact-details-map-arrow"></div>
            <div id="map"></div>
        </div>

    </div>
    <!-- /Personal details + map -->

</div>