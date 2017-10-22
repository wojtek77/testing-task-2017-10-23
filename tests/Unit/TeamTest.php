<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamTest extends TestCase
{
    static private $insertedId;
    
    /**
     * @return void
     */
    public function testInsert()
    {
        $result = \DB::table('teams')->insert(
            ['title' => 'test1']
        );
        self::$insertedId = \DB::getPdo()->lastInsertId();
        $this->assertTrue($result);
    }

      /**
     * @return void
     */
    public function testAddPlayers()
    {
        for ($i = 0; $i < 3; ++$i) {
            $result = \DB::table('players')->insert([
                'team_id' => self::$insertedId,
                'firstname' => 'firstname'.$i,
                'lastname' => 'lastname'.$i
            ]);
            $this->assertTrue($result);
        }
    }

    /**
     * @return void
     */
    public function testUpdate()
    {
        $result = \DB::table('teams')
            ->where('id', self::$insertedId)
            ->update(['title' => 'test2']);
        $this->assertTrue((bool) $result);
    }

    /**
     * @return void
     */
    public function testDelete()
    {
        $result = \DB::table('teams')
            ->where('id', self::$insertedId)
            ->delete();
        $this->assertTrue((bool) $result);
    }
}
