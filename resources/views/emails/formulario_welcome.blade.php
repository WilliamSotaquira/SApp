<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Consulta de servicio - Weirdoware</title>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="icons/icono.png" />



</head>
<body>
	<section>
		<table border="0" cellpadding="0" cellspacing="0" height="100%" lang="es-419" style="min-width:348px" width="100%">
			<tbody>

				<tr height="32" style="height:32px">
					<td>
					</td>
				</tr>
				<tr align="center">
					<td>
						<div>
							<div>
							</div>
						</div>

						<table border="0" cellpadding="0" cellspacing="0" style="padding-bottom:20px;max-width:516px;min-width:220px">
							<tbody>
								<tr>
									<td style="width:8px" width="8">
									</td>
									<td>
										<div align="center" class="m_6309808043716325268mdv2rw" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:30px 20px;">
											<img style="padding-bottom: 15px" src="http://weirdoware.com/icons/Logo5.png">
											<div style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serifcolor:rgba(0,0,0,0.87);font-size:26px" >											
												Consulta web de servicio 
											</div>

											<div style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;padding-bottom:6px;padding-top:10px;text-align:center;word-break:break-word">
												
												<table align="center" style="margin-top:8px">
													<tbody>
														<tr style="line-height:normal">
															<td align="right" style="padding-right:8px">
															</td>
															<td>
																<a style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px">

																</a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">
												<table style="font-size:14px;letter-spacing:0.2;line-height:20px;text-align:center;padding-bottom:24px;border-bottom:thin solid #f0f0f0 ">
													<tbody>
														<tr>
															<td colspan="2" style="padding-bottom:12px;text-align:center;color:rgba(0,0,0,0.87);">
																<p style="margin-bottom:0;margin-top:0"><strong>Atento Saludo,</strong> se a registrado una consulta mediante el formulario de registro en la pagina principal.
																</p>
															</td>
														</tr>


													</tbody>
												</table>
											</div>

											<div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:10px;text-align:center">
												<table style="font-size:14px;letter-spacing:0.2;line-height:20px;text-align:center;padding-bottom:12px;border-bottom:thin solid #f0f0f0">
													<tbody>

														<tr>
															<td colspan="2" style="padding-bottom:12px;text-align:center;color:#3c4043">
																<p style="margin-bottom:0;margin-top:0">A continuación se describe la información de la consulta.
																</p>
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Tipo de consulta:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">{{$data['tipo_consulta']}}
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Persona de contacto:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">{{$data['nombres']}}&nbsp;{{$data['apellidos']}} 
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">E-mail:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0"> {{$data['email']}}
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Celular de contacto:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">
																	 {{$data['celular']}}
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Descripción:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">
																	{{$data['descripcion']}}
																</p>												
															</td>
														</tr>	
														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Conforme:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">
																	{{$data['conforme']}}
																</p>												
															</td>
														</tr>														
														<tr>
															<td colspan="2" style="font-size:12px;margin-bottom:24px;color:rgba(0,0,0,0.54);text-align:center">¿Tiene alguna pregunta?
																<br>Vaya directamente a 
																<a href="" class="" style="color:rgba(0,0,0,0.87);">http://localhost:8000/contacto
																</a>
															</td>
														</tr>
													</tbody>
												</table>

				


											<table style="font-size:14px;letter-spacing:0.2;line-height:20px;text-align:center">
												<tbody>
													<tr>
														<td colspan="2" style="color:rgba(0,0,0,0.87);font-size:11px;letter-spacing:0.8px;line-height:16px;text-align:start;padding:24px 0 0 0">PREGUNTAS QUE RECIBIMOS
														</td>
													</tr>
													<tr>
														<td style="color:rgba(0,0,0,0.87);vertical-align:top;padding:15px 15px 0 0 0;text-align:start" width="10px"><br>
															<img height="24" src="https://ci4.googleusercontent.com/proxy/lmgpmtPRiIYfBKyihnjSiOCAX3dJGmPQgFy37eJ_ZcHjdV_rawGWgNzJ04dpBCwmSFeDtOkGQPgevrKrawk5Nugt8vIeFBhdqZ-EghJNq6blt76_6hkeDwgtCJlcCgI3Ynaz=s0-d-e1-ft#https://www.gstatic.com/accountalerts/email/security-shield-question-mark_2x.png" style="width:24px;height:24px;margin-right:12px" width="24" class="CToWUd">
														</td>
														<td style="color:rgba(0,0,0,0.87);vertical-align:top;padding:16px 0 0 0;text-align:start">
															<div style="font-size:16px;line-height:24px">
																<b>¿Que hacer si estos datos no son correctos?
																</b>
															</div>
															<div style="margin-top:4px">Puede contactar la línea de atención gratuita nacional 018000-112064, &nbsp;, al los teléfonos 310 772 9885, 301 743 2398.
									
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div style="text-align:center">
										<div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center">
											<div>Este correo contiene información confidencial y es prohibida su difusión sin debida autorización.
											</div>
											<div style="direction:ltr">© 2020 weirdoware.,
												<a class="m_6309808043716325268afal" style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center"> Cr 78A 76A 23 sur, Bogotá D.C., BOG, COLOMBIA
												</a>
											</div>
										</div>
										<div style="display:none!important;max-height:0px;max-width:0px">1549071794577000
										</div>
									</div>
								</td>
								<td style="width:8px" width="8">
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr height="32" style="height:32px">
				<td>
				</td>
			</tr>
		</tbody>
	</table>		
</section>	
</body>
<script src="https://use.fontawesome.com/fd6220c6dc.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>


