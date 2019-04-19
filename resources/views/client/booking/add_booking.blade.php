@extends('layouts.clientLayout.client_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#">Bookings</a> <a href="#" class="current">Book</a> 
        </div>
        <h1>Book Session</h1>
    </div>
    <div class="container-fluid"><hr>
        @if(Session::has('flash_message_error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!!session('flash_message_error')!!}</strong>
        </div>
        @endif
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!!session('flash_message_success')!!}</strong>
        </div>
        @endif
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Booking Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('client/add_booking')}}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Service </label>
                                <div class="controls">
                                    <select name="category_id" style="width: 220px;">
                                        <?php echo $categories_dropdown ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Start date</label>
                                <div class="controls">
                                    <input type="text" data-date="04/08/2019 2:25 PM" data-date-format="dd-mm-yyyy" placeholder="04/08/2019 2:25 PM" class="datepicker span11" style="width: 220px;" id="startdate" name="startdate">
                                    <span class="help-block">Date Format (dd-mm-yy hh:mm)</span>
                                </div>
                                <script>$(function () {
                                        ('.datepicker').datepicker();
                                    });
                                </script>
                            </div>
                            <div class="control-group">
                                <label class="control-label">End date</label>
                                <div class="controls">
                                    <input type="text" data-date="04/08/2019 2:25 PM" data-date-format="dd-mm-yyyy" placeholder="04/08/2019 2:25 PM" class="datepicker span11" style="width: 220px;" id="enddate" name="enddate">
                                    <span class="help-block">Date Format (dd-mm-yy hh:mm)</span> </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">County</label>
                                <div class="controls">
                                    <select name="county" style="width: 220px;">
                                        <option value="Mombasa" selected="selected">Mombasa</option>
                                        <option value="Kwale">Kwale</option>
                                        <option value="kilifi">Kilifi</option>
                                        <option value="Tana River">Tana River</option>
                                        <option value="lamu">Lamu</option>
                                        <option value="TaitaTaveta">Taita–Taveta</option>
                                        <option value="Garissa">Garissa</option>
                                        <option value="Wajir">Wajir</option>
                                        <option value="Mandera">Mandera</option>
                                        <option value="Marsabit">Marsabit</option>
                                        <option value="Isiolo">Isiolo</option>
                                        <option value="Meru">Meru</option>
                                        <option value="Tharaka-Nithi">Tharaka-Nithi</option>
                                        <option value="embu">Embu</option>
                                        <option value="Kitui">Kitui</option>
                                        <option value="Machakos">Machakos</option>
                                        <option value="Makueni">Makueni</option>
                                        <option value="Nyandarua">Nyandarua</option>
                                        <option value="Nyeri">Nyeri</option>
                                        <option value="Kirinyaga">Kirinyaga</option>
                                        <option value="Muranga">Murang'a</option>
                                        <option value="Kiambu">Kiambu</option>
                                        <option value="Turkana">Turkana</option>
                                        <option value="West Pokot">West Pokot</option>
                                        <option value="Samburu">Samburu</option>
                                        <option value="Trans-Nzoia">Trans-Nzoia</option>
                                        <option value="Uasin Gishu">Uasin Gishu</option>
                                        <option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
                                        <option value="Nandi">Nandi</option>
                                        <option value="Baringo">Baringo</option>
                                        <option value="Laikipia">Laikipia</option>
                                        <option value="Nakuru">Nakuru</option>
                                        <option value="Narok">Narok</option>
                                        <option value="Kajiado">Kajiado</option>
                                        <option value="Kericho">Kericho</option>
                                        <option value="Bomet">Bomet</option>
                                        <option value="Kakamega">Kakamega</option>
                                        <option value="Vihiga">Vihiga</option>
                                        <option value="Bungoma">Bungoma</option>
                                        <option value="Busia">Busia</option>
                                        <option value="siaya">Siaya</option>
                                        <option value="kisumu">Kisumu</option>
                                        <option value="Homa Bay">Homa Bay</option>
                                        <option value="Migori">Migori</option>
                                        <option value="Kisii">Kisii</option>
                                        <option value="nyamira">Nyamira</option>
                                        <option value="nairobi">Nairobi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Town</label>
                                <div class="controls">
                                    <input type="text" name="town" id="town">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Adress</label>
                                <div class="controls">
                                    <textarea name="adress" id="adress"></textarea>
                                </div>
                            </div> 
                            <div class="form-actions">
                                <input type="submit" value="Book" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection