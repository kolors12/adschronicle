<?php


function make_pages($page,$limit,$total,$filePath,$otherParams)

{

	@$divs=$total%$limit;

	if($divs==0)

	{

	@$tots=(int)($total/$limit);

	}else{

	@$tots=(int)($total/$limit) + 1;

	}

	echo "<a href=\"$filePath?page=".(1)."&$otherParams\"class='leftnavi_links_paging'>[First]</a>&nbsp;&nbsp;";

	if($tots==1)

	{

	echo "<a href=\"$filePath?page=1&$otherParams\" class='leftnavi_links_paging'>[1]</a>&nbsp;&nbsp;";

	}

	if($tots>1)

	{

		if($page>1)

		{

		echo "<a href=\"$filePath?page=".($page-1)."&$otherParams\"class='leftnavi_links_paging'><< previous</a>&nbsp;&nbsp;";

		}
		

		
if(!empty($page))
{

if(($page-5)>=1)
{
echo "<a href=\"$filePath?page=".($page-5)."&$otherParams\" class='leftnavi_links_paging'>".($page-5)."</a>&nbsp;&nbsp;";
}

if(($page-4)>=1)
{
echo "<a href=\"$filePath?page=".($page-4)."&$otherParams\" class='leftnavi_links_paging'>".($page-4)."</a>&nbsp;&nbsp;";
}

if(($page-3)>=1)
{
echo "<a href=\"$filePath?page=".($page-3)."&$otherParams\" class='leftnavi_links_paging'>".($page-3)."</a>&nbsp;&nbsp;";
}

if(($page-2)>=1)
{
echo "<a href=\"$filePath?page=".($page-2)."&$otherParams\" class='leftnavi_links_paging'>".($page-2)."</a>&nbsp;&nbsp;";
}
if(($page-1)>=1)
{
echo "<a href=\"$filePath?page=".($page-1)."&$otherParams\" class='leftnavi_links_paging'>".($page-1)."</a>&nbsp;&nbsp;";
}
echo "<a href=\"$filePath?page=$page&$otherParams\" class='leftnavi_links_paging'>[$page]</a>&nbsp;&nbsp;";

if(($page+1)<=$tots)
{
echo "<a href=\"$filePath?page=".($page+1)."&$otherParams\" class='leftnavi_links_paging'>".($page+1)."</a>&nbsp;&nbsp;";
}
if(($page+2)<=$tots)
{
echo "<a href=\"$filePath?page=".($page+2)."&$otherParams\" class='leftnavi_links_paging'>".($page+2)."</a>&nbsp;&nbsp;";
}
if(($page+3)<=$tots)
{
echo "<a href=\"$filePath?page=".($page+3)."&$otherParams\" class='leftnavi_links_paging'>".($page+3)."</a>&nbsp;&nbsp;";
}
if(($page+4)<=$tots)
{
echo "<a href=\"$filePath?page=".($page+4)."&$otherParams\" class='leftnavi_links_paging'>".($page+4)."</a>&nbsp;&nbsp;";
}
if(($page+5)<=$tots)
{
echo "<a href=\"$filePath?page=".($page+5)."&$otherParams\" class='leftnavi_links_paging'>".($page+5)."</a>&nbsp;&nbsp;";
}
}
else
{
if($tots>3)
{
if(1<=$tots)
{
echo "<a href=\"$filePath?page=1&$otherParams\" class='leftnavi_links_paging'>1</a>&nbsp;&nbsp;";
}
if(2<=$tots)
{
echo "<a href=\"$filePath?page=2&$otherParams\" class='leftnavi_links_paging'>2</a>&nbsp;&nbsp;";
}
if(3<=$tots)
{
echo "<a href=\"$filePath?page=3&$otherParams\" class='leftnavi_links_paging'>3</a>&nbsp;&nbsp;";
}
if(4<=$tots)
{
echo "<a href=\"$filePath?page=4&$otherParams\" class='leftnavi_links_paging'>4</a>&nbsp;&nbsp;";
}
echo ".........";echo "&nbsp;&nbsp;";
if(($tots-3)>=1)
{
echo "<a href=\"$filePath?page=".($tots-3)."&$otherParams\" class='leftnavi_links_paging'>".($tots-3)."</a>&nbsp;&nbsp;";
}
if(($tots-2)>=1)
{
echo "<a href=\"$filePath?page=".($tots-2)."&$otherParams\" class='leftnavi_links_paging'>".($tots-2)."</a>&nbsp;&nbsp;";
}
if(($tots-1)>=1)
{
echo "<a href=\"$filePath?page=".($tots-1)."&$otherParams\" class='leftnavi_links_paging'>".($tots-1)."</a>&nbsp;&nbsp;";
}
echo "<a href=\"$filePath?page=".($tots)."&$otherParams\" class='leftnavi_links_paging'>".($tots)."</a>&nbsp;&nbsp;";
}
else
{
for(@$i=1;$i<=$tots;$i++)
		{
		if($page==$i)
		{
		echo "<a href=\"$filePath?page=$i&$otherParams\" class='leftnavi_links_paging'>[$i]</a>&nbsp;&nbsp;";
		}else{
		echo "<a href=\"$filePath?page=$i&$otherParams\" class='leftnavi_links_paging'>$i</a>&nbsp;&nbsp;";
		}
		}}
}
}

		if($page<$tots)

		{

		if($page==0 && $tots>1)

		{

		echo "<a href=\"$filePath?page=".($page+1+1)."&$otherParams\"class='leftnavi_links_paging'>next >></a>&nbsp;&nbsp;";

		}else{
if($tots>1)
{
		echo "<a href=\"$filePath?page=".($page+1)."&$otherParams\"class='leftnavi_links_paging'>next >></a>&nbsp;&nbsp;";
}
		}

		

	
	}

	echo "<a href=\"$filePath?page=".($tots)."&$otherParams\"class='leftnavi_links_paging'>[Last]</a>&nbsp;&nbsp;";




}

?>