<select id="passing_year" name="passing_year[]" class="form-control" style="width: 98%;<?php if ($errors->has('passing_year[]')) echo 'border: 1px solid red;';?>">
  <?php for($i= 1950; $i<=2020; $i++){ ?>
   <option value="{{$i}}">{{$i}}</option>
   <?php } ?>
  </select>