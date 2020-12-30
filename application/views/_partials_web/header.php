<?php $profil=$profil->row_array(); ?>
<div class="container agile-banner_nav">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			
			<h1><a class="navbar-brand" href="index.html">
				<?php echo $profil['nama_app']; ?></a></h1>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url('admin'); ?>">Login<span class="sr-only">(current)</span></a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('Web/register'); ?>">Register<span class="sr-only">(current)</span></a>
					</li>

					
				</ul>
			</div>
		  
		</nav>
	</div>