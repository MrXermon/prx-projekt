{include file='default_header.tpl'}

<h1>Plan</h1>
<table>
	<thead>
		<tr>
			<th>Beginn</th>
			<th>Ende</th>
			<th>Modul</th>
			<th>Lehrkraft</th>
			<th>Raum</th>
			<th>Beschreibung</th>
		</tr>
	</thead>
	<tbody>
	{foreach $data as $row}
		<tr>
			<td>{$row.Vorlesung_Beginn|date_format:"%d.%m.%Y %H:%M"} Uhr</td>
			<td>{$row.Vorlesung_Ende|date_format:"%H:%M"} Uhr</td>
			<td>{$row.Modul_Name|utf8_encode}</td>
			<td>Lehrkraft...</td>
			<td>Raum...</td>
			<td>{$row.Vorlesung_Beschreibung|utf8_encode}</td>
		</tr>
	{/foreach}
	</tbody>
    </table>

{include file='default_footer.tpl'}
