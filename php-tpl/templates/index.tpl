{include file="header.tpl" title=foo}


<center><h2>{$project_name}</h2></center>
<br/>

<b>{$name|upper}</b>
<hr/>


<h2>List of names</h2>
{section name=sec1 loop=$list_of_names} 
	{$list_of_names[sec1]} <br>
{/section}


{include file="footer.tpl"}
