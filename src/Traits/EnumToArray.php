<?php

namespace Kiralyta\Ntak\Traits;

trait EnumToArray
{
    /**
     * names
     *
     * @return array
     */
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    /**
     * values
     *
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * array
     *
     * @return array
     */
    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }

    /**
     * random
     *
     * @return mixed
     */
    public static function random()
    {
        return self::cases()[array_rand(self::cases())];
    }

    /**
     * fromName
     *
     * @return mixed
     */
    public static function fromName(string $name)
    {
        foreach (self::cases() as $item) {
            if( $name === $item->name ){
                return $item;
            }
        }
        throw new \ValueError("$name is not a valid backing value for enum " . self::class );
    }
}
