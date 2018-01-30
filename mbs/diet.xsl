<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <html>
  
  <body bgcolor="#ffeedd">
    <center><h1>Week's Diet Plan</h1>
	
    <table border="1">
	
      <tr bgcolor="#9acd32">
        
	<th>Day</th>
        <th>Breakfast</th>
		 <th>Lunch</th>
        <th>Dinner</th>
      </tr>
      <xsl:for-each select="diet/day">
      <tr bgcolor="#90ee90">
        <td><xsl:value-of select="dy" /></td>
        <td><xsl:value-of select="br" /></td>
		<td><xsl:value-of select="ln" /></td>
        <td><xsl:value-of select="dn" /></td>
		
      </tr>
      </xsl:for-each>
    </table></center>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>

