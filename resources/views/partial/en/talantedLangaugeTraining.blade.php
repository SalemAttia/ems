     <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">langauges</a></li>
              <li><a href="#tab_2" data-toggle="tab">training activity</a></li>
              <li><a href="#tab_3" data-toggle="tab">talents </a></li>
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 @include('partial.form.en.langauge')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                @include('partial.form.en.traningactivity')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                @include('partial.form.en.talant')
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->