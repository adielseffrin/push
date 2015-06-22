@if(session('response'))
<div class="response-data" >
<strong>Response:</strong><br/>	
<pre style="width:100%;">
{{ session('response') }}
</pre>
</div>
@endif
