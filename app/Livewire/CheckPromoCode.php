<?php

namespace App\Livewire;

use Livewire\Component;

class CheckPromoCode extends Component
{
    public $promo_code;
    public $discount=0;
    public $discount_type;
    public $isvalid=false;


    public function checkPromoCode()
    {
        $promo = $this->findPromoCode($this->promo_code);

        if ($promo) {
          $this->applyPromoCode ($promo);
        } else {
            $this->invalidatePromoCode ();
        }

        $this->dispatchPromoCodeUpdate();
    }

    public function findPromoCode($promoCode)
    {
        return PromoCode::where('code', $promoCode)
        ->where('valid_until', '>=', now())
        ->where('is_used', false)
        ->first();
    }
    
    public function applyPromoCode($promo)
    {
        $this->isvalid = true;
        $this->discount = $promo->discount ?? 0;
        $this->discount_type = $promo->discount_type;
    }
    
    public function invalidatePromoCode()
    {
        $this->isvalid = false;
        $this->discount = 0;
        $this->discount_type = null;
    }

    public function dispatchPromoCodeUpdate()
    {
        $this->dispatch('promoCodeUpdated',
        ['discount' => $this->discount,
        'discount_type' => $this->discount_type
    ]);
    }
    
    public function render()
    {
        return view('livewire.check-promo-code');
    }
}
