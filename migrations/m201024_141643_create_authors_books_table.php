<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%authors_books}}`.
 */
class m201024_141643_create_authors_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%authors_books}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'book_id' => $this->integer(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-authors_books-author_id',
            'authors_books',
            'author_id'
        );

        // add foreign key for table `author`
        $this->addForeignKey(
            'author_id-author',
            'authors_books',
            'author_id',
            'author',
            'id',
            'CASCADE'
        );

        // creates index for column `book_id`
        $this->createIndex(
            'idx-authors_books-book_id',
            'authors_books',
            'book_id'
        );

        // add foreign key for table `book`
        $this->addForeignKey(
            'book_id-book',
            'authors_books',
            'book_id',
            'book',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%authors_books}}');
    }
}
