<?php
declare(strict_types=1);

namespace Malesh\Partner\Api\Data;

/**
 * PartnerInterface with constants, getters and setters for all their properties
 */
interface PartnerInterface
{
    /**
     * property id
     */
    public const ID = 'id';

    /**
     * property name
     */
    public const NAME = 'name';

    /**
     * property email
     */
    public const EMAIL = 'email';

    /**
     * property phone
     */
    public const PHONE = 'phone';

    /**
     * Get partner id
     *
     * @return int
     */
    public function getPartnerId(): int;

    /**
     * Set partner id
     *
     * @param int $id
     * @return void
     */
    public function setPartnerId(int $id): void;

    /**
     * Get partner name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Set partner name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name): void;

    /**
     * Get partner email
     *
     * @return string
     */
    public function getEmail(): string;

    /**
     * Set partner email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void;

    /**
     * Get partner phone
     *
     * @return string
     */
    public function getPhone(): string;

    /**
     * Set partner phone
     *
     * @param string $phone
     * @return void
     */
    public function setPhone(string $phone): void;
}
