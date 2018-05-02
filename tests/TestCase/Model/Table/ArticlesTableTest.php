<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArticlesTable Test Case
 */
class ArticlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticlesTable
     */
    public $Articles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.articles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Articles') ? [] : ['className' => ArticlesTable::class];
        $this->Articles = TableRegistry::get('Articles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Articles);

        parent::tearDown();
    }

    public function testCreateSlug()
    {
        $result = $this->Articles->createSlug('Hello World');
        $this->assertEquals('hello-world', $result);
        $result = $this->Articles->createSlug('Hello!, World');
        $this->assertEquals('hello-world', $result);
        $result = $this->Articles->createSlug('Hello   World*$');
        $this->assertEquals('hello-world', $result);
        $result = $this->Articles->createSlug('Hello-   World-');
        $this->assertEquals('hello-world', $result);
    }

    public function  testBeforeMarshal()
    {
        $article = $this->Articles->newEntity();
        $article = $this->Articles->patchEntity($article, ['title'=>'Hello World, It\'s a fine day']);
        $this->Articles->save($article);

        $result = $this->Articles->find()->first();
        $this->assertEquals('hello-world-it-s-a-fine-day', $result['slug']);
    }
}
