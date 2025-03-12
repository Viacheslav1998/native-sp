import { defineConfig } from 'vite';

export default defineConfig({
  root: 'src',
  build: {
    outDir: '../root',
    emptyOutDir: false,
    rollupOptions: {
      input: 'src/main.js',
      output: {
        assetFileNames: 'static/[name][extname]', // Всё в static
        chunkFileNames: 'static/[name].js',
        entryFileNames: 'static/[name].js'
      }
    }
  },
  publicDir: false
});
