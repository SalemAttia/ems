<!-- /.col -->
<div class="row" style="margin: 0 !important;">
  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
    <div class="form-group">
      <label>langauges </label>
      <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" name="langauges[]" style="width: 100%;">
      @if($employee->langauges)
            @if ($employee->langauges != 'N;') 
            <?php $lang = unserialize($employee->langauges); ?>
            @foreach($lang as $la)
        <option value="AF" <?php if($la == 'AF') echo "selected";?>>Afrikanns</option>
        <option value="SQ" <?php if($la == 'SQ') echo "selected";?>>Albanian</option>
        <option value="AR" <?php if($la == 'AR') echo "selected";?>>Arabic</option>
        <option value="HY" <?php if($la == 'HY') echo "selected";?>>Armenian</option>
        <option value="EU" <?php if($la == 'EU') echo "selected";?>>Basque</option>
        <option value="BN" <?php if($la == 'BN') echo "selected";?>>Bengali</option>
        <option value="BG" <?php if($la == 'BG') echo "selected";?>>Bulgarian</option>
        <option value="CA" <?php if($la == 'CA') echo "selected";?>>Catalan</option>
        <option value="KM" <?php if($la == 'KM') echo "selected";?>>Cambodian</option>
        <option value="ZH" <?php if($la == 'ZH') echo "selected";?>>Chinese (Mandarin)</option>
        <option value="HR" <?php if($la == 'HR') echo "selected";?>>Croation</option>
        <option value="CS" <?php if($la == 'CS') echo "selected";?>>Czech</option>
        <option value="DA" <?php if($la == 'DA') echo "selected";?>>Danish</option>
        <option value="NL" <?php if($la == 'NL') echo "selected";?>>Dutch</option>
        <option value="EN" <?php if($la == 'EN') echo "selected";?>>English</option>
        <option value="ET" <?php if($la == 'ET') echo "selected";?>>Estonian</option>
        <option value="FJ" <?php if($la == 'FJ') echo "selected";?>>Fiji</option>
        <option value="FI" <?php if($la == 'FI') echo "selected";?>>Finnish</option>
        <option value="FR" <?php if($la == 'FR') echo "selected";?>>French</option>
        <option value="KA" <?php if($la == 'KA') echo "selected";?>>Georgian</option>
        <option value="DE" <?php if($la == 'DE') echo "selected";?>>German</option>
        <option value="EL" <?php if($la == 'EL') echo "selected";?>>Greek</option>
        <option value="GU" <?php if($la == 'GU') echo "selected";?>>Gujarati</option>
        <option value="HE" <?php if($la == 'HE') echo "selected";?>>Hebrew</option>
        <option value="HI" <?php if($la == 'HI') echo "selected";?>>Hindi</option>
        <option value="HU" <?php if($la == 'HU') echo "selected";?>>Hungarian</option>
        <option value="IS" <?php if($la == 'IS') echo "selected";?>>Icelandic</option>
        <option value="ID" <?php if($la == 'ID') echo "selected";?>>Indonesian</option>
        <option value="GA" <?php if($la == 'GA') echo "selected";?>>Irish</option>
        <option value="IT" <?php if($la == 'IT') echo "selected";?>>Italian</option>
        <option value="JA" <?php if($la == 'JA') echo "selected";?>>Japanese</option>
        <option value="JW" <?php if($la == 'JW') echo "selected";?>>Javanese</option>
        <option value="KO" <?php if($la == 'KO') echo "selected";?>>Korean</option>
        <option value="LA" <?php if($la == 'LA') echo "selected";?>>Latin</option>
        <option value="LV" <?php if($la == 'LV') echo "selected";?>>Latvian</option>
        <option value="LT" <?php if($la == 'LT') echo "selected";?>>Lithuanian</option>
        <option value="MK" <?php if($la == 'MK') echo "selected";?>>Macedonian</option>
        <option value="MS" <?php if($la == 'MS') echo "selected";?>>Malay</option>
        <option value="ML" <?php if($la == 'ML') echo "selected";?>>Malayalam</option>
        <option value="MT" <?php if($la == 'MT') echo "selected";?>>Maltese</option>
        <option value="MI" <?php if($la == 'MI') echo "selected";?>>Maori</option>
        <option value="MR" <?php if($la == 'MR') echo "selected";?>>Marathi</option>
        <option value="MN" <?php if($la == 'MN') echo "selected";?>>Mongolian</option>
        <option value="NE" <?php if($la == 'NE') echo "selected";?>>Nepali</option>
        <option value="NO" <?php if($la == 'NO') echo "selected";?>>Norwegian</option>
        <option value="FA" <?php if($la == 'FA') echo "selected";?>>Persian</option>
        <option value="PL" <?php if($la == 'PL') echo "selected";?>>Polish</option>
        <option value="PT" <?php if($la == 'PT') echo "selected";?>>Portuguese</option>
        <option value="PA" <?php if($la == 'PA') echo "selected";?>>Punjabi</option>
        <option value="QU" <?php if($la == 'QU') echo "selected";?>>Quechua</option>
        <option value="RO" <?php if($la == 'RO') echo "selected";?>>Romanian</option>
        <option value="RU" <?php if($la == 'RU') echo "selected";?>>Russian</option>
        <option value="SM" <?php if($la == 'SM') echo "selected";?>>Samoan</option>
        <option value="SR" <?php if($la == 'SR') echo "selected";?>>Serbian</option>
        <option value="SK" <?php if($la == 'SK') echo "selected";?>>Slovak</option>
        <option value="SL" <?php if($la == 'SL') echo "selected";?>>Slovenian</option>
        <option value="ES" <?php if($la == 'ES') echo "selected";?>>Spanish</option>
        <option value="SW" <?php if($la == 'SW') echo "selected";?>>Swahili</option>
        <option value="SV" <?php if($la == 'SV') echo "selected";?>>Swedish </option>
        <option value="TA" <?php if($la == 'TA') echo "selected";?>>Tamil</option>
        <option value="TT" <?php if($la == 'TT') echo "selected";?>>Tatar</option>
        <option value="TE" <?php if($la == 'TE') echo "selected";?>>Telugu</option>
        <option value="TH" <?php if($la == 'TH') echo "selected";?>>Thai</option>
        <option value="BO" <?php if($la == 'BO') echo "selected";?>>Tibetan</option>
        <option value="TO" <?php if($la == 'TO') echo "selected";?>>Tonga</option>
        <option value="TR" <?php if($la == 'TR') echo "selected";?>>Turkish</option>
        <option value="UK" <?php if($la == 'UK') echo "selected";?>>Ukranian</option>
        <option value="UR" <?php if($la == 'UR') echo "selected";?>>Urdu</option>
        <option value="UZ" <?php if($la == 'UZ') echo "selected";?>>Uzbek</option>
        <option value="VI" <?php if($la == 'VI') echo "selected";?>>Vietnamese</option>
        <option value="CY" <?php if($la == 'CY') echo "selected";?>>Welsh</option>
        <option value="XH" <?php if($la == 'XH') echo "selected";?>>Xhosa</option>
        @endforeach
        @endif
        @endif
      </select>
    </div>
  </div>
  <!-- /.col -->
  
</div>
