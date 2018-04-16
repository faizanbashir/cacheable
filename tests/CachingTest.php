<?php

use Faizanbashir\Cacheable\Caching;

class CachingTest extends TestCase
{
    /** @test */
    public function it_caches_the_given_key()
    {
        $post = $this->makePost();
    
        $cache = new \Illuminate\Cache\Repository(
            new \Illuminate\Cache\ArrayStore
        );

        $cache = new Caching($cache);

        $cache->put($post, '<div>view fragment</div>');

        $this->assertTrue($cache->has($post->getCacheKey()));
        $this->assertTrue($cache->has($post));
    }
}
