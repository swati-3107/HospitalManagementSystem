<footer id="footer">
 <?=isset($company) && $company['company_name']!=''?$company['company_name']:'<a href="http://bigmarkretail.com">bigmarkretail.com</a>'?>
 <?=date('Y')?> &copy; All Rights Reserved.
|
 
<a href="<?=$base_path?>admin">Admin Login</a> 
</footer>
</div>
<style>
    @media print{
        #header,#column-left,.btn,print-hide,.breadcrumb,.paging_simple_numbers,#footer,.dataTables_length,.dataTables_filter
        {
            display: none !important;
        }
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
 // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('select').select2();
});
</script>
<style>
 span.select2.select2-container.select2-container--default.select2-container--above.select2-container--focus,select.form-control {
     width: 100% !important;
     line-height:34px;
     height:38px;
}
.select2{
    width: 100% !important;
     line-height:34px;
     height:38px;
}
 .badge{background-color: #A00C0C}
 #br{
  clear: right;
 }
</style>
</body>
</html>