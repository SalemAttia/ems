     <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#tab_1" data-toggle="tab">langauge</a></li>
              <li><a href="#tab_2" data-toggle="tab">traning activity</a></li>
              <li><a href="#tab_3" data-toggle="tab">talant </a></li>
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 @include('partial.form.edit.en.langauge')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                @include('partial.form.edit.en.traningactivity')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                @include('partial.form.edit.en.talant')
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->