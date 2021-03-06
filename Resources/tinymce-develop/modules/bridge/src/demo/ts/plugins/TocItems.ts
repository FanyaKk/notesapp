import { Fun } from '@ephox/katamari';

import { getDemoRegistry } from '../buttons/DemoRegistry';

const editor = {
  on: (_s, _f) => { },
  isDirty: Fun.always
};

export const registerTocItems = (): void => {
  getDemoRegistry().addButton('toc', {
    type: 'button',
    enabled: true,
    onSetup: (buttonApi) => {
      editor.on('LoadContent SetContent change', (e) => {
        buttonApi.setEnabled(!e);
      });
      return Fun.noop;
    },
    onAction: (_buttonApi) => {
      // insert Table of contents
    }
  });
};
