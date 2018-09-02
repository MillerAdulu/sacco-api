<?php
  
  namespace App\Http\Resources;
  
  use App\MemberLoan;
  use App\Member;
  use App\LoanType;
  use App\LoanRepaymentStatus;
  use App\LoanIssuingStatus;
  
  use Illuminate\Http\Resources\Json\JsonResource;
  
  class MemberLoanResource extends JsonResource
  {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'type' => 'MemberLoan',
        'memberLoanId' => $this->member_loan_id,
        'member' => new MemberResource(
          Member::find(
            $this->member_id
          )
        ),
        'loanType' => new LoanTypeResource(
          LoanType::findOrFail(
            $this->loan_type_id
          )
        ),
        'loanPurpose' => $this->loan_purpose,
        'loanAmount' => $this->loan_amount,
        'repaymentPeriod' => $this->repayment_period,
        'loanRepaymentStatus' => new LoanRepaymentStatusResource(
          LoanRepaymentStatus::findOrFail(
            $this->loan_repayment_status_id
          )
        ),
        'loanIssuingStatus' => new LoanIssuingStatusResource(
          LoanIssuingStatus::find(
            $this->loan_issuing_status_id
          )
        ),
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      ];
    }
  }
