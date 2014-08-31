<?php


namespace Nam\Gateway;


use Nam\Factory\ShoppingCart;

class ShoppingHistory
{
    /**
     * @var CartGateway
     */
    private $gateway;
    private $shoppingCartIds = [ ];

    public function __construct( CartGateway $gateway, array $ids = [ ] )
    {
        $this->gateway         = $gateway;
        $this->shoppingCartIds = $ids;
    }

    public function persistCart( ShoppingCart $cart )
    {
        $this->shoppingCartIds[] = $this->gateway->persist( $cart );
    }

    public function listAllCarts()
    {
        $shoppingCarts = [ ];

        foreach ($this->shoppingCartIds as $id) {
            $shoppingCarts[] = $this->gateway->retrieve( $id );
        }

        return $shoppingCarts;
    }

} 