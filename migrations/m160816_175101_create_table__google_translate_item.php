<?php
class m160816_175101_create_table__google_translate_item extends yii\db\Migration
{
    const TABLE_NAME = '{{%google_translate_item}}';

    public function up()
    {
        $tableOptions = null;

        $tableExist = $this->db->getTableSchema(self::TABLE_NAME, true);
        if ($tableExist)
        {
            return true;
        }

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TABLE_NAME, [
            'id'                    => $this->primaryKey(),

            'created_by'            => $this->integer(),
            'updated_by'            => $this->integer(),
            'created_at'            => $this->integer(),
            'updated_at'            => $this->integer(),

            'source_format'                     => $this->string(4)->defaultValue('text')->comment('Format'),
            'source_language'                   => $this->string(5)->comment('Source language'),
            'source_phrase'                     => $this->string(128)->notNull()->comment('Source phrase'),

            'target_language'                   => $this->string(5)->notNull()->comment('Target language'),
            'target_phrase'                     => $this->string(256)->notNull()->comment('Translation result'),

            'detected_source_language'          => $this->string(5)->comment('Detected source language'),

        ], $tableOptions);

        $this->createIndex('source_language', self::TABLE_NAME, 'source_language');
        $this->createIndex('source_phrase', self::TABLE_NAME, 'source_phrase');
        $this->createIndex('source_format', self::TABLE_NAME, 'source_format');

        $this->createIndex('source_unique', self::TABLE_NAME, ['source_phrase', 'source_language', 'source_format', 'target_language'], true);

        $this->createIndex('target_language', self::TABLE_NAME, 'target_language');
        $this->createIndex('target_phrase', self::TABLE_NAME, 'target_phrase');
        $this->createIndex('detected_source_language', self::TABLE_NAME, 'detected_source_language');

        $this->addForeignKey(
            'google_translate_item__created_by', self::TABLE_NAME,
            'created_by', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );

        $this->addForeignKey(
            'google_translate_item__updated_by', self::TABLE_NAME,
            'updated_by', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );
    }

    public function down()
    {
        $this->dropIndex('google_translate_item__created_by', self::TABLE_NAME);
        $this->dropIndex('google_translate_item__updated_by', self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
    }
}