import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";

const editorElement = document.querySelector('#editor')

if (editorElement) {
    const editor = new Editor({
        element: editorElement,

        extensions: [
            StarterKit
        ],

        content: '',

        onUpdate({ editor }) {
            document.querySelector('description').value = editor.getHTML()
        },

        editorProps: {
            attributes: {
                class: 'min-h-[150px] px-6 py-4 outline-none focus:outline-none'
            }
        }
    })

    document.querySelector('#bold')
        .addEventListener('click', () => {
            editor.chain().focus().toggleBold().run()
        })

    document.querySelector('#Itaric')
        .addEventListener('click', () => {
            editor.chain().focus().toggleItalic().run()
        })

    document.querySelector('#List')
        .addEventListener('click', () => {
            editor.chain().focus().toggleBulletList().run()
        })
}
