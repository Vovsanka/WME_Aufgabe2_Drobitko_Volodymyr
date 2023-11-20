<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
    <table class="data__table">
        <thead>
            <tr>    
                <th>ID</th>
                <th>Country</th>
                <th>birth rate / 1000</th>
                <th>cell phones / 100</th>
                <th>children / woman</th>
                <th>life expectancy</th>
                <th>internet user / 100</th>   
            </tr>
        </thead>
        <tbody>
            <xsl:for-each select="Countries/Country">
            <tr>
                <td><xsl:value-of select="id" /></td>
                <td><xsl:value-of select="name" /></td>
                <td><xsl:value-of select="birth" /></td>
                <td><xsl:value-of select="cell" /></td>
                <td><xsl:value-of select="children" /></td>
                <td><xsl:value-of select="life" /></td>
                <td><xsl:value-of select="internet" /></td>
            </tr>
            </xsl:for-each>
        </tbody>
    </table>
</xsl:template>

</xsl:stylesheet>