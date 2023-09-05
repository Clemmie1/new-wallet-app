<?php

/*
 * This file is part of the PHPFlasher package.
 * (c) Younes KHOUBZA <younes.khoubza@gmail.com>
 */

namespace Flasher\SweetAlert\Laravel\Facade;

use Flasher\Prime\Notification\Envelope;
use Flasher\Prime\Notification\NotificationInterface;
use Flasher\Prime\Stamp\StampInterface;
use Flasher\SweetAlert\Prime\SweetAlertBuilder;
use Illuminate\Support\Facades\Facade;

/**
 * @method static SweetAlertBuilder addSuccess(string $message, array $options = array())
 * @method static SweetAlertBuilder addError(string $message, array $options = array())
 * @method static SweetAlertBuilder addWarning(string $message, array $options = array())
 * @method static SweetAlertBuilder addInfo(string $message, array $options = array())
 * @method static SweetAlertBuilder addFlash(NotificationInterface|string $type, string $message = null, array $options = array())
 * @method static SweetAlertBuilder flash(StampInterface[] $stamps = array())
 * @method static SweetAlertBuilder type(string $type, string $message = null, array $options = array())
 * @method static SweetAlertBuilder message(string $message)
 * @method static SweetAlertBuilder options(array $options, bool $merge = true)
 * @method static SweetAlertBuilder option(string $name, string $value)
 * @method static SweetAlertBuilder success(string $message = null, array $options = array())
 * @method static SweetAlertBuilder error(string $message = null, array $options = array())
 * @method static SweetAlertBuilder info(string $message = null, array $options = array())
 * @method static SweetAlertBuilder warning(string $message = null, array $options = array())
 * @method static SweetAlertBuilder priority(int $priority)
 * @method static SweetAlertBuilder hops(int $amount)
 * @method static SweetAlertBuilder keep()
 * @method static SweetAlertBuilder delay(int $delay)
 * @method static SweetAlertBuilder now()
 * @method static SweetAlertBuilder with(StampInterface[] $stamps = array())
 * @method static SweetAlertBuilder withStamp(StampInterface $stamp)
 * @method static SweetAlertBuilder handler(string $handler)
 * @method static Envelope          getEnvelope()
 * @method static SweetAlertBuilder question(string $message = null, array $options = array())
 * @method static SweetAlertBuilder title(string $title)
 * @method static SweetAlertBuilder titleText(string $titleText)
 * @method static SweetAlertBuilder html(string $html)
 * @method static SweetAlertBuilder text(string $text)
 * @method static SweetAlertBuilder icon(string $icon)
 * @method static SweetAlertBuilder iconColor(string $iconColor)
 * @method static SweetAlertBuilder iconHtml(string $iconHtml)
 * @method static SweetAlertBuilder showClass(string $showClass, string $value)
 * @method static SweetAlertBuilder hideClass(string $hideClass, string $value)
 * @method static SweetAlertBuilder footer($footer)
 * @method static SweetAlertBuilder backdrop(bool $backdrop = true)
 * @method static SweetAlertBuilder toast(bool $toast = true, string $position = 'top-end', bool $showConfirmButton = false)
 * @method static SweetAlertBuilder target(string $target)
 * @method static SweetAlertBuilder input(string $input)
 * @method static SweetAlertBuilder width(string $width)
 * @method static SweetAlertBuilder padding(string $padding)
 * @method static SweetAlertBuilder background(string $background)
 * @method static SweetAlertBuilder position(string $position)
 * @method static SweetAlertBuilder grow(bool|string $grow)
 * @method static SweetAlertBuilder customClass(string $customClass, string $value)
 * @method static SweetAlertBuilder timer(int $timer)
 * @method static SweetAlertBuilder timerProgressBar(bool $timerProgressBar = true)
 * @method static SweetAlertBuilder heightAuto(bool $heightAuto = true)
 * @method static SweetAlertBuilder allowOutsideClick(bool|string $allowOutsideClick = true)
 * @method static SweetAlertBuilder allowEscapeKey(bool $allowEscapeKey = true)
 * @method static SweetAlertBuilder allowEnterKey(bool $allowEnterKey = true)
 * @method static SweetAlertBuilder stopKeydownPropagation(bool $stopKeydownPropagation = true)
 * @method static SweetAlertBuilder keydownListenerCapture(bool $keydownListenerCapture = true)
 * @method static SweetAlertBuilder showConfirmButton(bool $showConfirmButton = true, string $confirmButtonText = null, string $confirmButtonColor = null, string $confirmButtonAriaLabel = null)
 * @method static SweetAlertBuilder showDenyButton(bool $showDenyButton = true, string $denyButtonText = null, string $denyButtonColor = null, string $denyButtonAriaLabel = null)
 * @method static SweetAlertBuilder showCancelButton(bool $showCancelButton = true, string $cancelButtonText = null, string $cancelButtonColor = null, string $cancelButtonAriaLabel = null)
 * @method static SweetAlertBuilder confirmButtonText(string $confirmButtonText, string $confirmButtonColor = null, string $confirmButtonAriaLabel = null)
 * @method static SweetAlertBuilder denyButtonText(string $denyButtonText, string $denyButtonColor = null, string $denyButtonAriaLabel = null)
 * @method static SweetAlertBuilder cancelButtonText(string $cancelButtonText, string $cancelButtonColor = null, string $cancelButtonAriaLabel = null)
 * @method static SweetAlertBuilder confirmButtonColor(string $confirmButtonColor)
 * @method static SweetAlertBuilder denyButtonColor(string $denyButtonColor)
 * @method static SweetAlertBuilder cancelButtonColor(string $cancelButtonColor)
 * @method static SweetAlertBuilder confirmButtonAriaLabel(string $confirmButtonAriaLabel)
 * @method static SweetAlertBuilder denyButtonAriaLabel(string $denyButtonAriaLabel)
 * @method static SweetAlertBuilder cancelButtonAriaLabel(string $cancelButtonAriaLabel)
 * @method static SweetAlertBuilder buttonsStyling(bool $buttonsStyling = true)
 * @method static SweetAlertBuilder reverseButtons(bool $reverseButtons = true)
 * @method static SweetAlertBuilder focusConfirm(bool $focusConfirm = true)
 * @method static SweetAlertBuilder focusDeny(bool $focusDeny = true)
 * @method static SweetAlertBuilder focusCancel(bool $focusCancel = true)
 * @method static SweetAlertBuilder showCloseButton(bool $showCloseButton = true)
 * @method static SweetAlertBuilder closeButtonHtml(string $closeButtonHtml)
 * @method static SweetAlertBuilder closeButtonAriaLabel(string $closeButtonAriaLabel)
 * @method static SweetAlertBuilder loaderHtml(string $loaderHtml)
 * @method static SweetAlertBuilder showLoaderOnConfirm(bool $showLoaderOnConfirm = true)
 * @method static SweetAlertBuilder scrollbarPadding(bool $scrollbarPadding = true)
 * @method static SweetAlertBuilder preConfirm(bool|string $preConfirm)
 * @method static SweetAlertBuilder preDeny(string $preDeny)
 * @method static SweetAlertBuilder returnInputValueOnDeny(bool $returnInputValueOnDeny = true)
 * @method static SweetAlertBuilder imageUrl(string $imageUrl, int $imageWidth = null, int $imageHeight = null, string $imageAlt = null)
 * @method static SweetAlertBuilder imageWidth(int $imageWidth)
 * @method static SweetAlertBuilder imageHeight(int $imageHeight)
 * @method static SweetAlertBuilder imageAlt(string $imageAlt)
 * @method static SweetAlertBuilder image(string $title, string $text, string $imageUrl, int $imageWidth = 400, int $imageHeight = 200, string $imageAlt = null)
 * @method static SweetAlertBuilder addImage(string $title, string $text, string $imageUrl, int $imageWidth = 400, int $imageHeight = 200, string $imageAlt = null)
 * @method static SweetAlertBuilder inputLabel(string $inputLabel)
 * @method static SweetAlertBuilder inputPlaceholder(string $inputPlaceholder)
 * @method static SweetAlertBuilder inputValue(string $inputValue)
 * @method static SweetAlertBuilder inputOptions(string $inputOptions)
 * @method static SweetAlertBuilder inputAutoTrim(bool $inputAutoTrim = true)
 * @method static SweetAlertBuilder inputAttributes(string $inputAttributes)
 * @method static SweetAlertBuilder inputValidator(string $inputValidator)
 * @method static SweetAlertBuilder validationMessage(string $validationMessage)
 */
class SweetAlert extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flasher.sweetalert';
    }
}
