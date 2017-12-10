     <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#tab_1" data-toggle="tab">اللغات</a></li>
              <li><a href="#tab_2" data-toggle="tab">الدورات التدريبية</a></li>
              <li><a href="#tab_3" data-toggle="tab">المواهب </a></li>
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 @include('partial.form.langauge')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                @include('partial.form.traningactivity')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                @include('partial.form.talant')
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->