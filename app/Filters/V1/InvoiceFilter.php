<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class InvoiceFilter extends ApiFilter {
  protected $safeParams = [
    'customerId'    =>    ['eq', 'lt', 'gt', 'lte'. 'gte'],
    'amount'        =>    ['eq', 'lt', 'gt', 'lte'. 'gte'],
    'status'        =>    ['eq', 'ne'],
    'billedDate'    =>    ['eq', 'lt', 'gt', 'lte'. 'gte'],
    'paidDate'      =>    ['eq', 'lt', 'gt', 'lte'. 'gte'],
  ];

  protected $columnMap = [
    'customerId'    =>    'customer_id',
    'billedDate'    =>    'billed_date',
    'paidDate'      =>    'paid_date'
  ];

  protected $operatorMap = [
    'eq'      =>      '=',
    'ne'      =>      '!=',
    'lt'      =>      '<',
    'lte'     =>      '<=',
    'gt'      =>      '>',
    'gte'     =>      '>=',
  ];
}