<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
    <table class="data__table">
        <thead>
            <tr>
                <xsl:for-each select="Countries/Country/*">     
                <th>
                    <xsl:value-of select="name()" />
                </th>       
                </xsl:for-each>
            </tr>
        </thead>
        <tbody>
            <xsl:for-each select="Countries/Country">
            <tr>
                <xsl:for-each select="./*">
                <td>
                    <xsl:value-of select="." />
                </td>
                </xsl:for-each>
            </tr>
            </xsl:for-each>
        </tbody>
    </table>
</xsl:template>

</xsl:stylesheet>