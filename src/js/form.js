const conf = {
  root: ".contact-form",
  rootMod: "novalidate",
  primaryControl: ".button-submit",
  primaryControlDispState: "button-disabled",
  primaryControlIntState: "disabled",
  controls: "input:not(.honey)",
  required: "input[required]",
  controlsStateInd: {
    valid: "valid",
    invalid: "invalid",
  },
  content: ".error-info",
  contentState: {
    property: "display",
    valid: "none",
    invalid: "block",
  },
  contentStateAria: "aria-hidden",
};

function getNodes() {
  const root = document.querySelector(conf.root);
  const primaryControl = root.querySelector(conf.primaryControl);
  const controls = root.querySelectorAll(conf.controls);
  const required = root.querySelectorAll(conf.required);
  const content = document.querySelectorAll(conf.content);

  return {
    root,
    primaryControl,
    controls,
    required,
    content,
  };
}

function setInitialState(dom, formValidityState) {
  dom.root.setAttribute(conf.rootMod, true);
  // Initial Content-display-state (conf.contentState)
  // is set in CSS to prevent flashing
  for (const node of dom.content) {
    node.setAttribute(conf.contentStateAria, true);
  }

  dom.primaryControl.classList.add(conf.primaryControlDispState);
  dom.primaryControl.setAttribute(conf.primaryControlIntState, true);
  // Set state provided by backend validation
  if (formValidityState === "valid") {
    for (const control of dom.controls) {
      control.initValidity = true;
      validateInput(control, dom);
    }
  } else if (formValidityState !== "empty") {
    for (const control of dom.controls) {
      control.initValidity =
        Object.keys(formValidityState).includes(control.name) === false;
      validateInput(control, dom);
    }
  }
}

function validateInput(control, dom, e) {
  if (typeof e === "undefined") {
    if (control.initValidity) {
      setInputValidState(control);
    } else {
      setInputInvalidState(control);
    }
  } else {
    if (control.validity.valid) {
      setInputValidState(control);
    } else {
      setInputInvalidState(control);
    }
  }
  validateForm(dom);
}

function setInputValidState(control) {
  control.nextElementSibling.style[conf.contentState.property] =
    conf.contentState.valid;
  control.nextElementSibling.setAttribute(conf.contentStateAria, true);
  control.classList.remove(conf.controlsStateInd.invalid);
  control.classList.add(conf.controlsStateInd.valid);
}

function setInputInvalidState(control) {
  control.nextElementSibling.style[conf.contentState.property] =
    conf.contentState.invalid;
  control.nextElementSibling.setAttribute(conf.contentStateAria, false);
  control.classList.remove(conf.controlsStateInd.valid);
  control.classList.add(conf.controlsStateInd.invalid);
}

function validateForm(dom) {
  let invalidRequiredFields = dom.required.length;

  for (const control of dom.required) {
    if (control.validity.valid) {
      invalidRequiredFields -= 1;
    }
  }

  if (invalidRequiredFields === 0) {
    dom.primaryControl.classList.remove(conf.primaryControlDispState);
    dom.primaryControl.removeAttribute(conf.primaryControlIntState);
  } else {
    dom.primaryControl.classList.add(conf.primaryControlDispState);
    dom.primaryControl.setAttribute(conf.primaryControlIntState, true);
  }
}

function init(formValidityState) {
  const dom = getNodes();
  setInitialState(dom, formValidityState);
  for (const control of dom.controls) {
    control.addEventListener(
      "blur",
      (e) => {
        validateInput(control, dom, e);
      },
      true
    );
  }
}

export { init };
