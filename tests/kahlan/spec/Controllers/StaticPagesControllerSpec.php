<?php
namespace AXM\Controllers;

describe(StaticPagesController::class, function() {
    it('extends base controller', function() {
        expect(new StaticPagesController())
        ->toBeAnInstanceOf(BaseController::class);
    });
});
