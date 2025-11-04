<?php
namespace SchrodtSven\BuzzCode;

#[Fruit]
#[Red]
class Foon
{   
    #[Route]
    public function home(): self
    {
        return $this;
    }
}