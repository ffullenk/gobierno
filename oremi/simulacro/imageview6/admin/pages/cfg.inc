<?xml version="1.0" encoding="ISO-8859-1"?>
<imageview>%key%
	<settings>
		<encode>%encode%</encode>
		<library>%library%</library>
		<imagemagick>%impath%</imagemagick>
		<thumbnails width="%tnwidth%" height="%tnheight%" quality="%tnquality%" />
		<annotation text="%antext%" color="%ancolor%" />
		<cache>%cache%</cache>
		<imageprotection>%imgprotect%</imageprotection>
		<display>
			<default><![CDATA[%defablum%]]></default>
			<skin><![CDATA[%template%]]></skin>
			<rss>%rss%</rss>
			<preload sizecheck="%pl_sizecheck%">
				<interface>%pl_ui%</interface>
				<albums>%pl_albums%</albums>
				<images>%pl_images%</images>
			</preload>
			<slideshow>%sstime%</slideshow>
		</display>
	</settings>
	<users>
%users%
	</users>
</imageview>