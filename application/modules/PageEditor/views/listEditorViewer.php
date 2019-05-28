<div class="m-portlet">
	<div class="m-portlet__body">
	<div class="summernote" id="m_summernote_1"></div>
	</div>
</div>

<script>
	var SummernoteDemo = {
	    init: function() {
	        $(".summernote").summernote({
	            height: 350,
	           /* toolbar: [
				    // [groupName, [list of button]]
				    ['style', ['bold', 'italic', 'underline', 'clear']],
				    ['font', ['strikethrough', 'superscript', 'subscript']],
				    ['fontsize', ['fontsize']],
				    ['color', ['color']],
				    ['para', ['ul', 'ol', 'paragraph']],
				    ['height', ['height']]
				]*/
	        })
	    }
	};
	jQuery(document).ready(function() {
	    SummernoteDemo.init()
	});
</script>