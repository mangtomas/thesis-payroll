<fieldset class="title-container">
<legend><i class="fa fa-user"></i> <?=ucwords($user['permission']['module'])?></legend>
<?=isset($success) ? showMessage($success) : null;?>
<div id="xrole">
<table class="table table-hover table-custom display" style="font: 12px 'Arial';" id="table">
    <thead>
      <tr>
        
        <th class="align-center">Action</th>
        <th class="align-center">First Name</th>
        <th class="align-center">Last Name</th>
        <th class="align-center">Username</th>
        <th class="align-center">Role</th>
        <th class="align-center">Status</th>
        <th class="align-center">Date Created</th>
        <th class="align-center">Last Update</th>
      </tr>
        </thead>
    <tbody>
    </tbody>
  </table>
  </div>
</fieldset>

<style type="text/css">
.row{margin-left: 0px;margin-right: 0px}
</style>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-gridTools.js"></script>
<script type="text/javascript">
var data = [];
$(document).ready(function(){
    /* Datatable decleration
    -----------------------------*/
   var oTable =  $('#table').dataTable({
    "sDom":"Tf<'clear'>rtip<'clear'>",
    "bProcessing": true,  
    "bServerSide": true,
    "sAjaxSource": "api/data/?gConf=<?=$hashConfig?>",
    
    "aoColumns":[

                {"bSearchable":false,"mData":"button","sWidth":"80px"},
                {"bSearchable":true,"mData":"first_name","sWidth":"150px",},
                {"bSearchable":true,"mData":"last_name","sWidth":"150px",},
                {"bSearchable":true,"mData":"email"},
                {"bSearchable":true,"mData":"role","sWidth":"150px",},
                {"bSearchable":false,"mData":"status","sWidth":"100px","sClass":'align-center'},
                {"bSearchable":false,"mData":"date_created","sWidth":"170px","sClass":'align-right'},
                {"bSearchable":false,"mData":"last_update","sWidth":"170px","sClass":'align-left'},
                ],
    "aoColumnDefs":[
                  {'bSortable':false,'aTargets':[0]},
                  {'bSortable':true,'aTargets':[1]},
                  {'bSortable':true,'aTargets':[2]},
                  {'bSortable':true,'aTargets':[3]},
                  {'bSortable':true,'aTargets':[4]},
                  {'bSortable':true,'aTargets':[5]},
                  {'bSortable':false,'aTargets':[6]},
                  {'bSortable':false,'aTargets':[7]},
                  ],
        "oTableTools": {
              "sRowSelect": "multi",
                 "aButtons": [

                              <?php
                                if ($user['permission']['_create']==1) {
                                  ?>
                                         {
                                          "sExtends": "addBtn",
                                          "sButtonText":"<i class='fa fa-plus white'></i> New record",
                                          "sUrl":"<?=base_url()?>xadmin/<?=$user['permission']['_url']?>/new-record"
                                        },
                                      <?php
                                    }
                                    ?>
                              {
                                "sExtends": "refreshBtn",
                              },
                              <?php
                                    if ($user['permission']['_update']==1) {
                                  ?>
                                       {
                                          "sExtends": "bActivate",
                                          "dxConfig" : "<?=$hashConfig?>"
                                        },
                                        {
                                          "sExtends": "bDeactivate",
                                          "dxConfig" : "<?=$hashConfig?>"
                                        },
                                      <?php
                                    }
                                  ?>
                              
                             ]
            },
           
          
            "bScrollCollapse": false,
            "iDisplayLength": 50,

    })
    /* end of datatable
    ----------------------------------*/

 });



</script>