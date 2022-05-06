@extends('frontend.layouts.app')
@push('style')
  <link rel="stylesheet" href="{{ asset('front_end/css/select2/select2.css') }}" />
@endpush
@section('title', 'Post A Job')
@section('mycontents')
<!--=================================
inner banner -->
<div class="header-inner bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-primary">Post a job</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/"> Home </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Post a job</span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
inner banner -->

<!--=================================
tab -->
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active show" id="Job-detail" role="tabpanel" aria-labelledby="Job-detail-tab">
        <section class="space-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @include('backend.message')
                        <form class="form-row needs-validation" method="POST" action="{{ route('store-PostJob') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" name="countries_route" value="{{ route('get-countries') }}">
                            <input type="hidden" class="job_post_type" id="job_post_type" name="job_post_type" value="3">
                                <div class="form-group col-md-12">
                                    <label for="title">Job Title *</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter Job Title" id="title" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid title.
                                    </div>
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Description *</label>
                                    <textarea class="form-control" id="summary-ckeditor" name="description" rows="4" required>{{ old('description') }}</textarea>
                                    <div class="invalid-feedback">
                                        Please provide description.
                                    </div>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>

                               <div class="form-group col-md-6">
                                    <label>Application Deadline</label>
                                    <input type="date" class="form-control" name="app_deadline" value="{{ old('app_deadline') }}" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid deadline.
                                    </div>
                                    @if ($errors->has('app_deadline'))
                                        <span class="text-danger">{{ $errors->first('app_deadline') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 select-border">
                                    <label>Job Category *</label>
                                    <select class="form-control basic-select" class="job_sector" name="job_sector" required>
                                        <option value="">Select</option>
                                        @foreach($jobcat as $row)
                                            <option value="{{ $row->id }}" {{ old('job_sector') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid category.
                                    </div>
                                    @if ($errors->has('job_sector'))
                                        <span class="text-danger">{{ $errors->first('job_sector') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 mb-0">
                                    <label>Salary *</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                                        </div>
                                        <input type="number" class="form-control" class="" min="100" name="min" placeholder="Min" value="{{ old('min') }}" required>
                                        <div class="invalid-feedback">
                                            Please provide minimum salary.
                                        </div>
                                    </div>
                                    @if ($errors->has('min'))
                                        <span class="text-danger">{{ $errors->first('min') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                                        </div>
                                        <input type="number" class="form-control" max="1000000" name="max" placeholder="Max" value="{{ old('max') }}" required>
                                        <div class="invalid-feedback">
                                            Please provide maximum salary.
                                        </div>
                                    </div>
                                    @if ($errors->has('max'))
                                        <span class="text-danger">{{ $errors->first('max') }}</span>
                                    @endif
                                </div>
                            <input type="hidden" name="currency_name" value="">
                                <div class="form-group col-md-6 mb-md-3 select-border">
                                    <label>Currency position</label>
                                    <select class="form-control basic-select currency" id="currency" name="currency" required>
                                        <option value="">Select</option>
                                        <option value="">Select</option>
                                        <option value="AED">United Arab Emirates dirham</option>
                                        <option value="AFN">Afghan afghani</option>
                                        <option value="ALL">Albanian lek</option>
                                        <option value="AMD">Armenian dram</option>
                                        <option value="AOA">Angolan kwanza</option>
                                        <option value="ARS">Argentine peso</option>
                                        <option value="AUD">Australian dollar</option>
                                        <option value="AWG">Aruban florin</option>
                                        <option value="AZN">Azerbaijani manat</option>
                                        <option value="BAM">Bosnia and Herzegovina convertible mark</option>
                                        <option value="BBD">Barbadian dollar</option>
                                        <option value="BDT">Bangladeshi taka</option>
                                        <option value="BGN">Bulgarian lev</option>
                                        <option value="BHD">Bahraini dinar</option>
                                        <option value="BIF">Burundian franc</option>
                                        <option value="BMD">Bermudian dollar</option>
                                        <option value="BND">Brunei dollar</option>
                                        <option value="BOB">Bolivian boliviano</option>
                                        <option value="BRL">Brazilian real</option>
                                        <option value="BSD">Bahamian dollar</option>
                                        <option value="BTN">Bhutanese ngultrum</option>
                                        <option value="BWP">Botswana pula</option>
                                        <option value="BYR">Belarusian ruble</option>
                                        <option value="BZD">Belize dollar</option>
                                        <option value="CAD">Canadian dollar</option>
                                        <option value="CDF">Congolese franc</option>
                                        <option value="CHF">Swiss franc</option>
                                        <option value="CLP">Chilean peso</option>
                                        <option value="CNY">Chinese yuan</option>
                                        <option value="COP">Colombian peso</option>
                                        <option value="CRC">Costa Rican colón</option>
                                        <option value="CUP">Cuban convertible peso</option>
                                        <option value="CVE">Cape Verdean escudo</option>
                                        <option value="CZK">Czech koruna</option>
                                        <option value="DJF">Djiboutian franc</option>
                                        <option value="DKK">Danish krone</option>
                                        <option value="DOP">Dominican peso</option>
                                        <option value="DZD">Algerian dinar</option>
                                        <option value="EGP">Egyptian pound</option>
                                        <option value="ERN">Eritrean nakfa</option>
                                        <option value="ETB">Ethiopian birr</option>
                                        <option value="EUR">Euro</option>
                                        <option value="FJD">Fijian dollar</option>
                                        <option value="FKP">Falkland Islands pound</option>
                                        <option value="GBP">British pound</option>
                                        <option value="GEL">Georgian lari</option>
                                        <option value="GHS">Ghana cedi</option>
                                        <option value="GMD">Gambian dalasi</option>
                                        <option value="GNF">Guinean franc</option>
                                        <option value="GTQ">Guatemalan quetzal</option>
                                        <option value="GYD">Guyanese dollar</option>
                                        <option value="HKD">Hong Kong dollar</option>
                                        <option value="HNL">Honduran lempira</option>
                                        <option value="HRK">Croatian kuna</option>
                                        <option value="HTG">Haitian gourde</option>
                                        <option value="HUF">Hungarian forint</option>
                                        <option value="IDR">Indonesian rupiah</option>
                                        <option value="ILS">Israeli new shekel</option>
                                        <option value="IMP">Manx pound</option>
                                        <option value="INR">Indian rupee</option>
                                        <option value="IQD">Iraqi dinar</option>
                                        <option value="IRR">Iranian rial</option>
                                        <option value="ISK">Icelandic króna</option>
                                        <option value="JEP">Jersey pound</option>
                                        <option value="JMD">Jamaican dollar</option>
                                        <option value="JOD">Jordanian dinar</option>
                                        <option value="JPY">Japanese yen</option>
                                        <option value="KES">Kenyan shilling</option>
                                        <option value="KGS">Kyrgyzstani som</option>
                                        <option value="KHR">Cambodian riel</option>
                                        <option value="KMF">Comorian franc</option>
                                        <option value="KPW">North Korean won</option>
                                        <option value="KRW">South Korean won</option>
                                        <option value="KWD">Kuwaiti dinar</option>
                                        <option value="KYD">Cayman Islands dollar</option>
                                        <option value="KZT">Kazakhstani tenge</option>
                                        <option value="LAK">Lao kip</option>
                                        <option value="LBP">Lebanese pound</option>
                                        <option value="LKR">Sri Lankan rupee</option>
                                        <option value="LRD">Liberian dollar</option>
                                        <option value="LSL">Lesotho loti</option>
                                        <option value="LTL">Lithuanian litas</option>
                                        <option value="LVL">Latvian lats</option>
                                        <option value="LYD">Libyan dinar</option>
                                        <option value="MAD">Moroccan dirham</option>
                                        <option value="MDL">Moldovan leu</option>
                                        <option value="MGA">Malagasy ariary</option>
                                        <option value="MKD">Macedonian denar</option>
                                        <option value="MMK">Burmese kyat</option>
                                        <option value="MNT">Mongolian tögrög</option>
                                        <option value="MOP">Macanese pataca</option>
                                        <option value="MRO">Mauritanian ouguiya</option>
                                        <option value="MUR">Mauritian rupee</option>
                                        <option value="MVR">Maldivian rufiyaa</option>
                                        <option value="MWK">Malawian kwacha</option>
                                        <option value="MXN">Mexican peso</option>
                                        <option value="MYR">Malaysian ringgit</option>
                                        <option value="MZN">Mozambican metical</option>
                                        <option value="NAD">Namibian dollar</option>
                                        <option value="NGN">Nigerian naira</option>
                                        <option value="NIO">Nicaraguan córdoba</option>
                                        <option value="NOK">Norwegian krone</option>
                                        <option value="NPR">Nepalese rupee</option>
                                        <option value="NZD">New Zealand dollar</option>
                                        <option value="OMR">Omani rial</option>
                                        <option value="PAB">Panamanian balboa</option>
                                        <option value="PEN">Peruvian nuevo sol</option>
                                        <option value="PGK">Papua New Guinean kina</option>
                                        <option value="PHP">Philippine peso</option>
                                        <option value="PKR">Pakistani rupee</option>
                                        <option value="PLN">Polish złoty</option>
                                        <option value="PRB">Transnistrian ruble</option>
                                        <option value="PYG">Paraguayan guaraní</option>
                                        <option value="QAR">Qatari riyal</option>
                                        <option value="RON">Romanian leu</option>
                                        <option value="RSD">Serbian dinar</option>
                                        <option value="RUB">Russian ruble</option>
                                        <option value="RWF">Rwandan franc</option>
                                        <option value="SAR">Saudi riyal</option>
                                        <option value="SBD">Solomon Islands dollar</option>
                                        <option value="SCR">Seychellois rupee</option>
                                        <option value="SDG">Singapore dollar</option>
                                        <option value="SEK">Swedish krona</option>
                                        <option value="SGD">Singapore dollar</option>
                                        <option value="SHP">Saint Helena pound</option>
                                        <option value="SLL">Sierra Leonean leone</option>
                                        <option value="SOS">Somali shilling</option>
                                        <option value="SRD">Surinamese dollar</option>
                                        <option value="SSP">South Sudanese pound</option>
                                        <option value="STD">São Tomé and Príncipe dobra</option>
                                        <option value="SVC">Salvadoran colón</option>
                                        <option value="SYP">Syrian pound</option>
                                        <option value="SZL">Swazi lilangeni</option>
                                        <option value="THB">Thai baht</option>
                                        <option value="TJS">Tajikistani somoni</option>
                                        <option value="TMT">Turkmenistan manat</option>
                                        <option value="TND">Tunisian dinar</option>
                                        <option value="TOP">Tongan paʻanga</option>
                                        <option value="TRY">Turkish lira</option>
                                        <option value="TTD">Trinidad and Tobago dollar</option>
                                        <option value="TWD">New Taiwan dollar</option>
                                        <option value="TZS">Tanzanian shilling</option>
                                        <option value="UAH">Ukrainian hryvnia</option>
                                        <option value="UGX">Ugandan shilling</option>
                                        <option value="USD">United States dollar</option>
                                        <option value="UYU">Uruguayan peso</option>
                                        <option value="UZS">Uzbekistani som</option>
                                        <option value="VEF">Venezuelan bolívar</option>
                                        <option value="VND">Vietnamese đồng</option>
                                        <option value="VUV">Vanuatu vatu</option>
                                        <option value="WST">Samoan tālā</option>
                                        <option value="XAF">Central African CFA franc</option>
                                        <option value="XCD">East Caribbean dollar</option>
                                        <option value="XOF">West African CFA franc</option>
                                        <option value="XPF">CFP franc</option>
                                        <option value="YER">Yemeni rial</option>
                                        <option value="ZAR">South African rand</option>
                                        <option value="ZMW">Zambian kwacha</option>
                                        <option value="ZWL">Zimbabwean dollar</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid currency.
                                    </div>
                                    @if ($errors->has('currency'))
                                        <span class="text-danger">{{ $errors->first('currency') }}</span>
                                    @endif
                                </div>

                                    <div class="form-group col-md-6 select-border">
                                        <label>Career Level</label>
                                        <select class="form-control basic-select" name="career_level" required>
                                            <option value="">Select</option>
                                            <option value="Internee">Internee</option>
                                            <option value="Beginner">Beginner</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="Experienced">Experienced</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid career level.
                                        </div>
                                        @if ($errors->has('career_level'))
                                            <span class="text-danger">{{ $errors->first('career_level') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 select-border">
                                        <label>Experience *</label>
                                        <select class="form-control basic-select" name="experience" required>
                                            <option value="">Select</option>
                                            <option value="3-months">3 Months</option>
                                            <option value="6-months">6 months</option>
                                            <option value="1-year">1 year</option>
                                            <option value="2-years">2 years</option>
                                            <option value="3-years">3 years</option>
                                            <option value="4-years">4 years</option>
                                            <option value="5-years">5 years</option>
                                            <option value="5+years">5+ years</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid experience.
                                        </div>
                                        @if ($errors->has('experience'))
                                            <span class="text-danger">{{ $errors->first('experience') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 select-border">
                                        <label>Gender *</label>
                                        <select class="form-control basic-select" name="gender" required>
                                            <option value="">Select</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Male/Female" {{ old('gender') == 'Male/Female' ? 'selected' : '' }}>Both Male/Female</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid gender.
                                        </div>
                                        @if ($errors->has('gender'))
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 mb-0 select-border">
                                        <label>Job Type *</label>
                                        <select class="form-control basic-select" name="job_type" required>
                                            <option value="">Select</option>
                                            <option value="Full-time" {{ old('job_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                            <option value="Part-time" {{ old('job_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                            <option value="Temporary" {{ old('job_type') == 'Temporary' ? 'selected' : '' }}>Temporary</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid job type.
                                        </div>
                                        @if ($errors->has('job_type'))
                                            <span class="text-danger">{{ $errors->first('job_type') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 mb-3 select-border">
                                        <label>Qualifications *</label>
                                        {{--<select class="form-control basic-select" name="qualification" required>
                                            <option value="">Select</option>
                                            <option value="Matric">Matric</option>
                                            <option value="FA">FA</option>
                                            <option value="FSc">FSc</option>
                                            <option value="BS">BS</option>
                                            <option value="BA">BA</option>
                                            <option value="MS">MS</option>
                                            <option value="MA">MA</option>
                                        </select>--}}
                                        <input type="text" class="form-control" name="qualification"  placeholder="BS(HONS) , Metric, Diploma" required>

                                        <div class="invalid-feedback">
                                            Please select a valid qualification.
                                        </div>
                                        @if ($errors->has('qualification'))
                                            <span class="text-danger">{{ $errors->first('qualification') }}</span>
                                        @endif
                                    </div>
                                   <input type="hidden" name="country_name" value="">
                                    <div class="form-group col-md-6 mt-3 select-border">
                                        <label>Country</label>
                                        <select class="form-control basic-select countries" id="countryId" name="country" required>
                                            <option value="">Select</option>
                                            {{--<option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PE">Peru</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Réunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>--}}
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                        @if ($errors->has('country'))
                                            <span class="text-danger">{{ $errors->first('country') }}</span>
                                        @endif
                                    </div>
                                    <input type="hidden" name="city_name" value="">
                                    <div class="form-group col-md-6 mt-3 select-border">
                                        <label>City</label>
                                        <select class="form-control basic-select cities" id="cityId" name="city" required>
                                            <option value="">Select</option>
                                            {{--<option value="Islamabad">Islamabad</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Orissa">Orissa</option>
                                            <option value="Pondicherry">Pondicherry</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttaranchal">Uttaranchal</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="West Bengal">West Bengal</option>--}}
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid city.
                                        </div>
                                        @if ($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>

                                    <!-- <div class="form-group col-12 mt-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="accepts-01">
                                            <label class="custom-control-label" for="accepts-01">You accept our Terms and Conditions and Privacy Policy</label>
                                        </div>
                                    </div> -->
                                    <div class="form-group col-md-12 pt-2">
                                    <p class="h5 text-dark">Company Information</p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Company Name *</label>
                                    <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" placeholder="Enter Company Name" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid company name.
                                    </div>
                                    @if ($errors->has('company_name'))
                                        <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Company Address *</label>
                                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter Company Address" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid address.
                                    </div>
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email Address *</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Company Email Address" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid email.
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 mb-3 select-border">
                                        <label>Choose Company Logo *</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" required>
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 mb-3 select-border">
                                        <div class="invalid-feedback">
                                            Please select a valid image.
                                        </div>
                                        @if ($errors->has('file'))
                                            <span class="text-danger">{{ $errors->first('file') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" value="Post Job" class="btn btn-primary">
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="{{ asset('back_end/js/location.js') }}"></script>
<script src="{{ asset('front_end/js/ckeditor/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace( 'description', {

});
</script>

@endsection

@push('script')
  <script src="{{ asset('front_end/js/select2/select2.full.js') }}"></script>
@endpush
