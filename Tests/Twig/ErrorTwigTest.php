<?php

namespace MewesK\TwigSpreadsheetBundle\Tests\Twig;

/**
 * Class ErrorTwigTest.
 *
 * @coversNothing
 */
class ErrorTwigTest extends BaseTwigTest
{
    protected static $TEMP_PATH = '/../../tmp/error/';

    //
    // PhpUnit
    //

    /**
     * @return array
     */
    public function formatProvider()
    {
        return [['ods'], ['xls'], ['xlsx']];
    }

    //
    // Tests
    //

    /**
     * @param string $format
     *
     * @throws \Exception
     *
     * @dataProvider formatProvider
     */
    public function testCellIndexError($format)
    {
        $this->expectException(\TypeError::class);
        $this->expectExceptionMessage('Argument 1 passed to MewesK\TwigSpreadsheetBundle\Wrapper\PhpSpreadsheetWrapper::setCellIndex() must be of the type integer, string given');

        $this->getDocument('cellIndexError', $format);
    }

    /**
     * @param string $format
     *
     * @throws \Exception
     *
     * @dataProvider formatProvider
     */
    public function testDocumentError($format)
    {
        $this->expectException(\Twig_Error_Syntax::class);
        $this->expectExceptionMessage('Node "MewesK\TwigSpreadsheetBundle\Twig\Node\DocumentNode" is not allowed inside of Node "MewesK\TwigSpreadsheetBundle\Twig\Node\SheetNode"');

        $this->getDocument('documentError', $format);
    }

    /**
     * @param string $format
     *
     * @throws \Exception
     *
     * @dataProvider formatProvider
     */
    public function testDocumentErrorTextAfter($format)
    {
        $this->expectException(\Twig_Error_Syntax::class);
        $this->expectExceptionMessage('Node "Twig_Node_Text" is not allowed after Node "MewesK\TwigSpreadsheetBundle\Twig\Node\DocumentNode"');

        $this->getDocument('documentErrorTextAfter', $format);
    }

    /**
     * @param string $format
     *
     * @throws \Exception
     *
     * @dataProvider formatProvider
     */
    public function testDocumentErrorTextBefore($format)
    {
        $this->expectException(\Twig_Error_Syntax::class);
        $this->expectExceptionMessage('Node "Twig_Node_Text" is not allowed before Node "MewesK\TwigSpreadsheetBundle\Twig\Node\DocumentNode"');

        $this->getDocument('documentErrorTextBefore', $format);
    }

    /**
     * @param string $format
     *
     * @throws \Exception
     *
     * @dataProvider formatProvider
     */
    public function testRowIndexError($format)
    {
        $this->expectException(\TypeError::class);
        $this->expectExceptionMessage('Argument 1 passed to MewesK\TwigSpreadsheetBundle\Wrapper\PhpSpreadsheetWrapper::setRowIndex() must be of the type integer, string given');

        $this->getDocument('rowIndexError', $format);
    }

    /**
     * @param string $format
     *
     * @throws \Exception
     *
     * @dataProvider formatProvider
     */
    public function testSheetError($format)
    {
        $this->expectException(\Twig_Error_Syntax::class);
        $this->expectExceptionMessage('Node "MewesK\TwigSpreadsheetBundle\Twig\Node\RowNode" is not allowed inside of Node "MewesK\TwigSpreadsheetBundle\Twig\Node\DocumentNode"');

        $this->getDocument('sheetError', $format);
    }
}
