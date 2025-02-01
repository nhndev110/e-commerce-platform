import {
  ClassicEditor,
  Alignment,
  Autoformat,
  Bold,
  Essentials,
  Heading,
  Italic,
  Link,
  List,
  Paragraph,
  ImageUpload,
  Table,
  TableToolbar,
  BlockQuote,
  Highlight,
  MediaEmbed,
  Underline,
  Strikethrough
} from 'ckeditor5';

const LICENSE_KEY =
  'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3Mzg1NDA3OTksImp0aSI6ImNjNjcxY2E4LWFmM2QtNDkzMi05NDY0LTFkOTEwZDc5MDEyOCIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6Ijg1NTA3YTQ2In0.mraQzb6TsZihIMAqdjqIwVY_3Gzjdycyo622is4xhTy3yA3AX_vTLPzwww1aIzhVwhMCNlUlr1XWSxbRtrmBjg';

const editorConfig = {
  toolbar: {
    items: [
      'heading',
      'bold',
      'italic',
      'underline',
      'strikethrough',
      '|',
      'link',
      'blockQuote',
      'insertTable',
      'mediaEmbed',
      'highlight',
      '|',
      'alignment',
      'bulletedList',
      'numberedList',
    ],
    shouldNotGroupWhenFull: false
  },
  plugins: [
    Alignment,
    Autoformat,
    Bold,
    Essentials,
    Heading,
    Italic,
    Link,
    List,
    Paragraph,
    ImageUpload,
    Table,
    TableToolbar,
    BlockQuote,
    Highlight,
    MediaEmbed,
    Underline,
    Strikethrough
  ],
  fontSize: {
    options: [10, 12, 14, 'default', 18, 20],
    supportAllValues: true
  },
  licenseKey: LICENSE_KEY,
  heading: {
    options: [
      { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
      { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
      { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
      { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
    ]
  },
  placeholder: 'Type or paste your content here!',
  table: {
    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
  }
};

export { ClassicEditor, editorConfig };
