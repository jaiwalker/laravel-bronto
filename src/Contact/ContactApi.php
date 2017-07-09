<?php

namespace Jaiwalker\BrontoApi\Contact;

use Jaiwalker\BrontoApi\Base;

/**
 *
 * @Author JaiKora <kora.jayaram@gmail.com>
 * @GitHub -  https://github.com/jaiwalker
 */
class ContactApi extends Base
{

    /* @var $contactObject \Bronto_Api_Contact */
    protected $contactObject;


    /**
     * ContactApi constructor.
     *
     * @param $token
     */
    public function __construct($token)
    {
        parent::__construct($token);

        $this->contactObject = $this->bronto->getContactObject();
    }


    /**
     * Create a new contact.
     *
     * @param      $email
     * @param null $customFields
     * @param null $list
     * @param null $status
     *
     * @return \Bronto_Api_Contact_Row|Exception|\Exception
     */
    public function create($email, $customFields = null, $list = null, $status = null)
    {
        /* @var $this->contactObject \Bronto_Api_Contact */

        /* @var $contact \Bronto_Api_Contact_Row */
        $contact = $this->contactObject->createRow();
        $contact->email = $email;
        $contact->status = (is_null($status) ? \Bronto_Api_Contact::STATUS_ONBOARDING : $status);

        // Add Contact to List
        if ( ! is_null($list)) {
            $contact->addToList($list); // $list can be the (string) ID or a Bronto_Api_List instance
        }

        // Set a custom Field value
        if (is_array($customFields)) {
            foreach ($customFields as $field => $value) {
                $contact->setField($field, $value);
            } // $field can be the (string) ID or a Bronto_Api_Field instance
        }

        // Save
        try {
            return $contact->save();
        } catch (Exception $e) {
            // Handle error
            return $e;
        }

    }


    /**
     * Update Or Create Contact
     *
     * @param      $email
     * @param null $customFields
     * @param null $list
     * @param null $status
     *
     * @return bool
     * @internal param $contact \Bronto_Api_Contact_Row
     *
     */
    public function updateOrCreate($email, $customFields = null, $list = null, $status = null)
    {
        $contact = $this->contactObject->createRow();

        $contact->email = $email;
        $contact->status = (is_null($status) ? \Bronto_Api_Contact::STATUS_ONBOARDING : $status);

        // Add Contact to List
        if ( ! is_null($list)) {
            $contact->addToList($list); // $list can be the (string) ID or a Bronto_Api_List instance
        }

        // Set a custom Field value
        if (is_array($customFields)) {
            foreach ($customFields as $field => $value) {
                $contact->setField($field, $value);
            } // $field can be the (string) ID or a Bronto_Api_Field instance
        }

        $contact->persist();
        $result = $this->contactObject->flush();

        if ($result->hasErrors()) {

            return $result->getErrors();
        }

        return true;
    }


    /**
     * Update Status By Email
     *
     * @param $email
     *
     * @return string | array
     * @internal param $contact \Bronto_Api_Contact_Row
     */
    public function updateByEmail($email)
    {
        $data = ['email' => $email, 'status' => \Bronto_Api_Contact::STATUS_ONBOARDING];

        $contact = $this->contactObject->update($data);

        if ($contact->hasErrors()) {
            return $contact->getErrors();
        }

        if (is_null($contact->current())) {
            // need throw Exception
            return "Unable to find email =>".$email;
        }

        return $contact->current()->getData();

    }


    /**
     * Search for a single Contact
     *
     * @param null $email
     *
     * @return array|bool
     * @internal param $contact \Bronto_Api_Contact_Row
     */
    public function getContactByEmail($email = null)
    {
        $filter = [
            'email' => [
                [
                    'operator' => 'EqualTo',
                    'value'    => $email
                ]
            ],
        ];

        $contact = $this->contactObject->read(['pageNumber' => 1, 'filter' => $filter]);

        if ($contact->hasErrors()) {
            return $contact->getErrors();

        } else {
            if (is_null($contact->current())) {
                // need throw Exception
                return "Unable to find email =>".$email;
            }

            return $contact->current()->getData();
        }
    }

}