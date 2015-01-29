<!-- switch show_user_login on -->
<form style="margin-bottom:0;" action="{CURRENT_VIEW}.php?{LOGIN_QUERYS}" method="post">
<input type="hidden" name="action" value="login" />
<table width="170" border="0" cellpadding="0" cellspacing="0" class="calborder">
	<tr>
		<td colspan="2" align="center" class="sideback"><div style="height: 17px; margin-top: 3px;" class="G10BOLD">{L_LOGIN}</div></td>
	</tr>
	<!-- switch invalid_login on -->
	<tr>
		<td colspan="2" bgcolor="#FFFFFF" align="left">
			<div style="padding-left: 5px; padding-top: 5px; padding-right: 5px;">
				<font color="red">{L_INVALID_LOGIN}</font>
			</div>
		</td>
	</tr>
	<!-- switch invalid_login off -->
	<tr>
		<td bgcolor="#FFFFFF" align="left" valign="middle"><div style="padding-left: 5px; padding-top: 5px;">{L_USERNAME}:</div></td>
		<td bgcolor="#FFFFFF" align="right" valign="middle"><div style="padding-right: 5px; padding-top: 5px;"><input type="text" name="username" size="10" /></div></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF" align="left" valign="middle"><div style="padding-left: 5px; padding-bottom: 5px;">{L_PASSWORD}:</div></td>
		<td bgcolor="#FFFFFF" align="right" valign="middle"><div style="padding-right: 5px; padding-bottom: 5px;"><input type="password" name="password" size="10" /></div></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF" align="center" valign="middle" colspan="2"><div style="padding-left: 5px; padding-bottom: 5px;"><input type="submit" value="{L_LOGIN}" /></div></td>
	</tr>
</table>
</form>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td class="tbll"><img src="images/spacer.gif" alt="" width="8" height="4" /></td>
		<td class="tblbot"><img src="images/spacer.gif" alt="" width="8" height="4" /></td>
		<td class="tblr"><img src="images/spacer.gif" alt="" width="8" height="4" /></td>
	</tr>
</table>
<img src="images/spacer.gif" width="1" height="10" alt=" " /><br />
<!-- switch show_user_login off -->
<table width="170" border="0" cellpadding="0" cellspacing="0" class="calborder">
	<tr>
		<td align="left" valign="top" width="24" class="sideback"><a class="psf" href="day.php?cal={CAL}&amp;getdate={PREV_DAY}"></a></td>
		<td align="center" width="112" class="sideback"><font class="G10BOLD">{SIDEBAR_DATE}</font></td>
		<td align="right" valign="top" width="24" class="sideback"><a class="psf" href="day.php?cal={CAL}&amp;getdate={NEXT_DAY}"></a></td>
	</tr>
	<tr>
		<td colspan="3" bgcolor="#FFFFFF" align="left">
			<div style="padding: 5px;">
				
				<a class="psf" href="print.php?cal={CAL}&amp;getdate={GETDATE}&amp;printview={CURRENT_VIEW}">{L_GOPRINT}</a><br />
				<!-- switch allow_preferences on -->
				<a class="psf" href="preferences.php?cal={CAL}&amp;getdate={GETDATE}">{L_PREFERENCES}</a><br />
				<!-- switch allow_preferences off -->
				<!-- switch display_download on -->
				<a class="psf" href="{SUBSCRIBE_PATH}">{L_SUBSCRIBE}</a>&nbsp;|&nbsp;<a class="psf" href="{DOWNLOAD_FILENAME}">{L_DOWNLOAD}</a><br />
				<!-- switch display_download off -->
				<!-- switch is_logged_in on -->
				<a class="psf" href="{CURRENT_VIEW}.php?{LOGOUT_QUERYS}">{L_LOGOUT} {USERNAME}</a>
				<!-- switch is_logged_in off -->
			</div>
		</td>
	</tr>
</table>

<br/>

<table width="170" border="0" cellpadding="0" cellspacing="0" class="calborder">
	<tr>
		<td align="center" class="sideback"><div style="height: 17px; margin-top: 3px;" class="G10BOLD">{L_TOMORROWS}</div></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF" align="left">
			<div style="padding: 5px;">
				<!-- switch t_allday on -->
				{T_ALLDAY}<br />
				<!-- switch t_allday off -->
				<!-- switch t_event on -->
				&bull; {T_EVENT}<br />
				<!-- switch t_event off -->
			</div>
		</td>
	</tr>
</table>



<!-- switch tomorrows_events off -->

