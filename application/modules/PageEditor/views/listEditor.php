<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Daftar Editor Halaman
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="#" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
						<span>
							<i class="la la-plus"></i>
							<span>Tambah Data</span>
						</span>
					</a>
				</li>
				<li class="m-portlet__nav-item"></li>

			</ul>
		</div>
	</div>
	<div class="m-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="tableEditor">
			<thead>
				<tr>
					<th>#</th>
					<th>Judul</th>
					<th>Interaksi</th>

				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>61715-075</td>
					<td>China</td>

				</tr>
				<tr>
					<td>2</td>
					<td>63629-4697</td>
					<td>Indonesia</td>

				</tr>

			</tbody>
		</table>
	</div>
</div>


<script>
jQuery(document).ready(function() {
	$("#tableEditor").DataTable({
            responsive: !0,
            pagingType: "full_numbers",
    });
});

</script>
